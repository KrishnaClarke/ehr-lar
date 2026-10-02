<?php

namespace Tests\Feature;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Services\PatientFlow;

class DischargeTest extends StaffTestCase
{
    public function test_discharge_keeps_the_record_and_frees_the_bed(): void
    {
        $this->ward(1);
        $patient = $this->admit();
        $flow = app(PatientFlow::class);
        $flow->assignDoctor(Doctor::factory()->create(), $patient, 'Asthma', now()->toDateString());
        $flow->assignNurse(Nurse::factory()->create(), $patient, now()->toDateString());

        $this->staff()->post("/patients/{$patient->id}/discharge")->assertRedirect('/patients');

        // The patient and their history are still there...
        $this->assertDatabaseHas('patients', ['id' => $patient->id]);
        $this->assertDatabaseHas('patient_records', [
            'patient_id' => $patient->id,
            'date_of_release' => now()->toDateString(),
        ]);
        $this->assertFalse($patient->fresh()->isAdmitted());

        // ...the bed is free again...
        $bed = Bed::first();
        $this->assertNull($bed->patient_id);
        $this->assertFalse($bed->occupied);

        // ...and care assignments were closed, not deleted.
        $this->assertDatabaseHas('doctor_patient', ['patient_id' => $patient->id, 'active' => false, 'date_unassigned' => now()->toDateString()]);
        $this->assertDatabaseHas('nurse_patient', ['patient_id' => $patient->id, 'active' => false, 'date_unassigned' => now()->toDateString()]);
    }

    public function test_a_freed_bed_can_be_reused(): void
    {
        $this->ward(1);
        $first = $this->admit();
        $this->staff()->post("/patients/{$first->id}/discharge");

        $second = $this->admit(['first_name' => 'Next', 'email' => 'next@example.org']);

        $this->assertSame($second->id, Bed::first()->patient_id);
    }

    public function test_discharging_twice_is_rejected(): void
    {
        $this->ward(1);
        $patient = $this->admit();

        $this->staff()->post("/patients/{$patient->id}/discharge");
        $this->staff()->post("/patients/{$patient->id}/discharge")->assertSessionHasErrors('patient');
    }
}
