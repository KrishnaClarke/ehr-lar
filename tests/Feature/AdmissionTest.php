<?php

namespace Tests\Feature;

use App\Models\Bed;
use App\Models\Patient;

class AdmissionTest extends StaffTestCase
{
    public function test_new_patient_is_admitted_to_the_first_free_bed(): void
    {
        $this->ward(2);

        $response = $this->staff()->post('/patients', [
            'first_name' => 'Grace',
            'last_name' => 'Hopper',
            'date_of_birth' => '1975-12-09',
            'email' => 'grace@example.org',
        ]);

        $patient = Patient::firstOrFail();
        $response->assertRedirect("/patients/{$patient->id}");

        $bed = Bed::orderBy('id')->first();
        $this->assertSame($patient->id, $bed->patient_id);
        $this->assertTrue($bed->occupied);

        $this->assertDatabaseHas('patient_records', [
            'patient_id' => $patient->id,
            'bed_id' => $bed->id,
            'date_of_release' => null,
        ]);
        $this->assertTrue($patient->isAdmitted());
        $this->assertSame(1, Bed::available()->count());
    }

    public function test_admission_is_refused_when_no_bed_is_free(): void
    {
        $this->ward(1);
        $this->admit();

        $this->staff()->post('/patients', [
            'first_name' => 'Late',
            'last_name' => 'Comer',
            'date_of_birth' => '1990-05-05',
            'email' => 'late@example.org',
        ])->assertSessionHasErrors('bed');

        $this->assertDatabaseCount('patients', 1);
        $this->assertDatabaseCount('patient_records', 1);
    }

    public function test_invalid_patient_data_is_rejected(): void
    {
        $this->ward();

        $this->staff()->post('/patients', [
            'first_name' => '',
            'last_name' => 'X',
            'date_of_birth' => now()->addYear()->toDateString(),
            'email' => 'not-an-email',
        ])->assertSessionHasErrors(['first_name', 'date_of_birth', 'email']);

        $this->assertDatabaseCount('patients', 0);
    }

    public function test_patient_details_can_be_edited(): void
    {
        $this->ward();
        $patient = $this->admit();

        $this->staff()->get("/patients/{$patient->id}/edit")->assertOk()->assertSee('Lovelace');

        $this->staff()->put("/patients/{$patient->id}", [
            'first_name' => 'Augusta',
            'last_name' => 'King',
            'email' => 'augusta@example.org',
        ])->assertRedirect("/patients/{$patient->id}");

        $this->assertSame('Augusta', $patient->fresh()->first_name);
    }

    public function test_patient_list_filters_by_admission_status(): void
    {
        $this->ward(2);
        $in = $this->admit(['last_name' => 'Inpatient', 'email' => 'in@example.org']);
        $out = $this->admit(['last_name' => 'Outpatient', 'email' => 'out@example.org']);
        $this->staff()->post("/patients/{$out->id}/discharge");

        // Match on e-mail: the discharge flash message also contains the patient's name.
        $this->staff()->get('/patients')->assertSee('in@example.org')->assertDontSee('out@example.org');
        $this->staff()->get('/patients?status=discharged')->assertSee('out@example.org')->assertDontSee('in@example.org');
        $this->staff()->get('/patients?status=all')->assertSee('in@example.org')->assertSee('out@example.org');
    }
}
