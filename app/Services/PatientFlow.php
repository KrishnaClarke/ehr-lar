<?php

namespace App\Services;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\DoctorPatient;
use App\Models\Nurse;
use App\Models\NursePatient;
use App\Models\Patient;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Business rules for moving a patient through the hospital:
 * admission -> bed -> care team -> discharge.
 *
 * Everything that touches more than one table runs in a transaction so the
 * bed, the admission record and the assignments can never disagree.
 */
class PatientFlow
{
    /**
     * Register a new patient and admit them to the first free bed.
     *
     * @param  array{first_name:string,last_name:string,date_of_birth:string,email:?string}  $data
     */
    public function admit(array $data): Patient
    {
        return DB::transaction(function () use ($data) {
            $bed = Bed::available()->with('ward')->orderBy('id')->lockForUpdate()->first();

            if (! $bed) {
                throw ValidationException::withMessages([
                    'bed' => 'No beds are currently available. Discharge a patient or add a bed first.',
                ]);
            }

            $patient = Patient::create($data + ['hospital_id' => $bed->ward->hospital_id]);

            PatientRecord::create([
                'hospital_id' => $bed->ward->hospital_id,
                'patient_id' => $patient->id,
                'bed_id' => $bed->id,
                'date_of_admission' => now()->toDateString(),
            ]);

            $bed->update(['patient_id' => $patient->id, 'occupied' => true]);

            return $patient;
        });
    }

    /** Put an admitted patient in a free bed, freeing any bed they held before. */
    public function assignBed(Patient $patient, Bed $bed): void
    {
        DB::transaction(function () use ($patient, $bed) {
            $this->assertAdmitted($patient, 'patient_id');

            $bed = Bed::lockForUpdate()->findOrFail($bed->id);

            if ($bed->patient_id !== null && $bed->patient_id !== $patient->id) {
                throw ValidationException::withMessages(['bed_id' => 'That bed is already occupied.']);
            }

            Bed::where('patient_id', $patient->id)
                ->where('id', '!=', $bed->id)
                ->update(['patient_id' => null, 'occupied' => false]);

            $bed->update(['patient_id' => $patient->id, 'occupied' => true]);

            $patient->records()->whereNull('date_of_release')->update(['bed_id' => $bed->id]);
        });
    }

    public function releaseBed(Bed $bed): void
    {
        if ($bed->patient_id === null) {
            throw ValidationException::withMessages(['bed_id' => 'That bed is already empty.']);
        }

        $bed->update(['patient_id' => null, 'occupied' => false]);
    }

    /**
     * Discharge keeps the patient and the history: it closes the open admission,
     * frees the bed and ends any active doctor/nurse assignments.
     */
    public function discharge(Patient $patient): void
    {
        DB::transaction(function () use ($patient) {
            $this->assertAdmitted($patient, 'patient');

            $today = now()->toDateString();

            $patient->records()->whereNull('date_of_release')->update(['date_of_release' => $today]);

            Bed::where('patient_id', $patient->id)->update(['patient_id' => null, 'occupied' => false]);

            DoctorPatient::where('patient_id', $patient->id)->where('active', true)
                ->update(['active' => false, 'date_unassigned' => $today]);

            NursePatient::where('patient_id', $patient->id)->where('active', true)
                ->update(['active' => false, 'date_unassigned' => $today]);
        });
    }

    public function assignDoctor(Doctor $doctor, Patient $patient, string $disease, string $date, bool $active = true): DoctorPatient
    {
        $this->assertAdmitted($patient, 'patient_id');

        $exists = DoctorPatient::where('doctor_id', $doctor->id)
            ->where('patient_id', $patient->id)->where('active', true)->exists();

        if ($exists && $active) {
            throw ValidationException::withMessages([
                'doctor_id' => 'This doctor is already actively assigned to this patient.',
            ]);
        }

        return DoctorPatient::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'active' => $active,
            'disease' => $disease,
            'date_assigned' => $date,
        ]);
    }

    public function assignNurse(Nurse $nurse, Patient $patient, string $date, bool $active = true): NursePatient
    {
        $this->assertAdmitted($patient, 'patient_id');

        $exists = NursePatient::where('nurse_id', $nurse->id)
            ->where('patient_id', $patient->id)->where('active', true)->exists();

        if ($exists && $active) {
            throw ValidationException::withMessages([
                'nurse_id' => 'This nurse is already actively assigned to this patient.',
            ]);
        }

        return NursePatient::create([
            'nurse_id' => $nurse->id,
            'patient_id' => $patient->id,
            'active' => $active,
            'date_assigned' => $date,
        ]);
    }

    /** End the active doctor assignment for a patient/doctor pair. */
    public function endDoctorAssignment(Doctor $doctor, Patient $patient, ?string $date = null): void
    {
        $updated = DoctorPatient::where('doctor_id', $doctor->id)
            ->where('patient_id', $patient->id)->where('active', true)
            ->update(['active' => false, 'date_unassigned' => $date ?? now()->toDateString()]);

        if ($updated === 0) {
            throw ValidationException::withMessages([
                'doctor_id' => 'There is no active assignment between this doctor and patient.',
            ]);
        }
    }

    /** End the active nurse assignment for a patient/nurse pair. */
    public function endNurseAssignment(Nurse $nurse, Patient $patient, ?string $date = null): void
    {
        $updated = NursePatient::where('nurse_id', $nurse->id)
            ->where('patient_id', $patient->id)->where('active', true)
            ->update(['active' => false, 'date_unassigned' => $date ?? now()->toDateString()]);

        if ($updated === 0) {
            throw ValidationException::withMessages([
                'nurse_id' => 'There is no active assignment between this nurse and patient.',
            ]);
        }
    }

    private function assertAdmitted(Patient $patient, string $field): void
    {
        if (! $patient->isAdmitted()) {
            throw ValidationException::withMessages([$field => 'This patient has already been discharged.']);
        }
    }
}
