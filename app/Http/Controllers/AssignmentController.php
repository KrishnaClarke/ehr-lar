<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignBedRequest;
use App\Http\Requests\AssignDoctorRequest;
use App\Http\Requests\AssignNurseRequest;
use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Services\PatientFlow;

class AssignmentController extends Controller
{
    public function __construct(private PatientFlow $flow)
    {
    }

    public function showAssignDoctorForm()
    {
        return view('assign.assign-doctor', $this->doctorFormData());
    }

    public function showAssignPatientForm()
    {
        return view('assign.assign-patient', $this->doctorFormData());
    }

    public function assignDoctorToPatient(AssignDoctorRequest $request)
    {
        $this->flow->assignDoctor(
            Doctor::findOrFail($request->doctor_id),
            Patient::findOrFail($request->patient_id),
            $request->disease,
            $request->date_assigned,
            $request->boolean('active', true),
        );

        return redirect("/patients/{$request->patient_id}")->with('success', 'Doctor assigned to patient.');
    }

    public function showAssignNurseToPatientForm()
    {
        return view('assign.assign-nurse-to-patient', $this->nurseFormData());
    }

    public function showAssignPatientToNurseForm()
    {
        return view('assign.assign-patient-to-nurse', $this->nurseFormData());
    }

    public function assignNurseToPatient(AssignNurseRequest $request)
    {
        $this->flow->assignNurse(
            Nurse::findOrFail($request->nurse_id),
            Patient::findOrFail($request->patient_id),
            $request->date_assigned,
            $request->boolean('active', true),
        );

        return redirect("/patients/{$request->patient_id}")->with('success', 'Nurse assigned to patient.');
    }

    public function showAssignBedToPatient()
    {
        return view('assign.bed-to-patient', [
            'patients' => Patient::admitted()->orderBy('last_name')->get(),
            'beds' => Bed::available()->with('ward')->orderBy('ward_id')->orderBy('id')->get(),
        ]);
    }

    public function assignBedToPatient(AssignBedRequest $request)
    {
        $this->flow->assignBed(
            Patient::findOrFail($request->patient_id),
            Bed::findOrFail($request->bed_id),
        );

        return redirect('/beds')->with('success', 'Patient assigned to bed.');
    }

    private function doctorFormData(): array
    {
        return [
            'doctors' => Doctor::orderBy('last_name')->get(),
            'patients' => Patient::admitted()->orderBy('last_name')->get(),
        ];
    }

    private function nurseFormData(): array
    {
        return [
            'nurses' => Nurse::orderBy('last_name')->get(),
            'patients' => Patient::admitted()->orderBy('last_name')->get(),
        ];
    }
}
