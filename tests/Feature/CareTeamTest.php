<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\DoctorPatient;
use App\Models\Nurse;
use App\Models\NursePatient;

class CareTeamTest extends StaffTestCase
{
    private function assignDoctor($doctor, $patient, array $extra = [])
    {
        return $this->staff()->post('/assign/assign-doctor', $extra + [
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'disease' => 'Asthma',
            'date_assigned' => now()->toDateString(),
            'active' => 1,
        ]);
    }

    public function test_a_doctor_can_be_assigned_to_an_admitted_patient(): void
    {
        $this->ward();
        $patient = $this->admit();
        $doctor = Doctor::factory()->create();

        $this->assignDoctor($doctor, $patient)->assertRedirect("/patients/{$patient->id}");

        $this->assertDatabaseHas('doctor_patient', ['doctor_id' => $doctor->id, 'patient_id' => $patient->id, 'active' => true]);
        $this->staff()->get("/patients/{$patient->id}")->assertSee($doctor->last_name)->assertSee('Asthma');
        $this->staff()->get("/doctors/{$doctor->id}")->assertSee('Lovelace');
    }

    public function test_the_same_doctor_cannot_be_actively_assigned_twice(): void
    {
        $this->ward();
        $patient = $this->admit();
        $doctor = Doctor::factory()->create();

        $this->assignDoctor($doctor, $patient);
        $this->assignDoctor($doctor, $patient)->assertSessionHasErrors('doctor_id');

        $this->assertSame(1, DoctorPatient::count());
    }

    public function test_both_doctor_assignment_urls_work(): void
    {
        $this->ward();
        $patient = $this->admit();
        $doctor = Doctor::factory()->create();

        $this->staff()->post('/assign/assign-patient', [
            'doctor_id' => $doctor->id, 'patient_id' => $patient->id,
            'disease' => 'Flu', 'date_assigned' => now()->toDateString(),
        ])->assertRedirect("/patients/{$patient->id}");
    }

    public function test_discharged_patients_cannot_be_assigned_staff(): void
    {
        $this->ward();
        $patient = $this->admit();
        $this->staff()->post("/patients/{$patient->id}/discharge");

        $this->assignDoctor(Doctor::factory()->create(), $patient)->assertSessionHasErrors('patient_id');
    }

    public function test_a_doctor_assignment_can_be_ended(): void
    {
        $this->ward();
        $patient = $this->admit();
        $doctor = Doctor::factory()->create();
        $this->assignDoctor($doctor, $patient);

        $this->staff()->put('/update/update-doc', [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'date_unassigned' => now()->toDateString(),
        ])->assertRedirect("/patients/{$patient->id}");

        $this->assertDatabaseHas('doctor_patient', ['doctor_id' => $doctor->id, 'active' => false]);
    }

    public function test_ending_a_missing_assignment_is_an_error(): void
    {
        $this->ward();
        $patient = $this->admit();

        $this->staff()->put('/update/update-doc', [
            'patient_id' => $patient->id,
            'doctor_id' => Doctor::factory()->create()->id,
        ])->assertSessionHasErrors('doctor_id');
    }

    public function test_nurse_assignment_both_urls_and_unassign(): void
    {
        $this->ward();
        $patient = $this->admit();
        $nurse = Nurse::factory()->create();

        $this->staff()->post('/assign/assign-nurse-to-patient', [
            'nurse_id' => $nurse->id, 'patient_id' => $patient->id, 'date_assigned' => now()->toDateString(),
        ])->assertRedirect("/patients/{$patient->id}");
        $this->assertSame(1, NursePatient::where('active', true)->count());

        $this->staff()->post('/assign/assign-patient-to-nurse', [
            'nurse_id' => $nurse->id, 'patient_id' => $patient->id, 'date_assigned' => now()->toDateString(),
        ])->assertSessionHasErrors('nurse_id'); // already actively assigned

        $this->staff()->put('/update/update-nurse', [
            'patient_id' => $patient->id, 'nurse_id' => $nurse->id,
        ])->assertRedirect("/patients/{$patient->id}");
        $this->assertSame(0, NursePatient::where('active', true)->count());
    }

    public function test_nurse_page_lists_colleagues_who_share_a_doctor(): void
    {
        $this->ward(2);
        $doctor = Doctor::factory()->create();
        $nurseA = Nurse::factory()->create(['first_name' => 'Alice', 'last_name' => 'Aardvark']);
        $nurseB = Nurse::factory()->create(['first_name' => 'Bob', 'last_name' => 'Badger']);
        $loner = Nurse::factory()->create(['first_name' => 'Cara', 'last_name' => 'Cuckoo']);
        $p1 = $this->admit(['email' => 'p1@example.org']);
        $p2 = $this->admit(['email' => 'p2@example.org']);

        $flow = app(\App\Services\PatientFlow::class);
        $today = now()->toDateString();
        $flow->assignDoctor($doctor, $p1, 'Flu', $today);
        $flow->assignDoctor($doctor, $p2, 'Flu', $today);
        $flow->assignNurse($nurseA, $p1, $today);
        $flow->assignNurse($nurseB, $p2, $today);

        $this->staff()->get("/nurses/{$nurseA->id}")
            ->assertOk()
            ->assertSee('Badger')
            ->assertDontSee('Cuckoo');
        $this->assertNotNull($loner);
    }

    public function test_people_with_assignment_history_cannot_be_deleted(): void
    {
        $this->ward();
        $patient = $this->admit();
        $busy = Doctor::factory()->create();
        $idle = Doctor::factory()->create();
        $this->assignDoctor($busy, $patient);

        $this->staff()->delete("/doctors/{$busy->id}")->assertSessionHas('error');
        $this->assertDatabaseHas('doctors', ['id' => $busy->id]);

        $this->staff()->delete("/doctors/{$idle->id}")->assertRedirect('/doctors');
        $this->assertDatabaseMissing('doctors', ['id' => $idle->id]);
    }

    public function test_doctors_and_nurses_can_be_added_and_edited(): void
    {
        $this->ward();

        $this->staff()->post('/doctors', [
            'first_name' => 'Gregory', 'last_name' => 'House',
            'date_of_birth' => '1970-06-11', 'email' => 'house@example.org',
        ])->assertRedirect();
        $doctor = Doctor::firstWhere('last_name', 'House');
        $this->assertNotNull($doctor);

        $this->staff()->put("/doctors/{$doctor->id}", [
            'first_name' => 'Greg', 'last_name' => 'House', 'email' => 'house@example.org',
        ])->assertRedirect("/doctors/{$doctor->id}");
        $this->assertSame('Greg', $doctor->fresh()->first_name);

        // duplicate e-mail rejected
        $this->staff()->post('/nurses', [
            'first_name' => 'Nina', 'last_name' => 'Nurse',
            'date_of_birth' => '1990-01-01', 'email' => 'nina@example.org',
        ])->assertRedirect();
        $this->staff()->post('/nurses', [
            'first_name' => 'Nick', 'last_name' => 'Nurse',
            'date_of_birth' => '1991-01-01', 'email' => 'nina@example.org',
        ])->assertSessionHasErrors('email');
    }
}
