<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;

class DashboardTest extends StaffTestCase
{
    public function test_dashboard_counts_free_beds_not_all_beds(): void
    {
        $this->ward(5);
        $this->admit(['email' => 'a@example.org']);
        $this->admit(['email' => 'b@example.org']);

        $this->staff()->get('/statistics')
            ->assertOk()
            ->assertViewHas('totalBeds', 5)
            ->assertViewHas('availableBeds', 3)
            ->assertViewHas('patientCount', 2)
            ->assertViewHas('occupancy', 40);
    }

    public function test_dashboard_does_not_count_discharged_patients_as_admitted(): void
    {
        $this->ward(2);
        $patient = $this->admit();
        $this->staff()->post("/patients/{$patient->id}/discharge");

        $this->staff()->get('/statistics')
            ->assertViewHas('patientCount', 0)
            ->assertViewHas('dischargedCount', 1)
            ->assertViewHas('availableBeds', 2);
    }

    public function test_seeded_demo_data_is_consistent_and_every_page_renders(): void
    {
        $this->seed(DatabaseSeeder::class);

        // A bed is "occupied" exactly when a patient sits in it.
        $this->assertSame(0, \App\Models\Bed::where('occupied', true)->whereNull('patient_id')->count());
        $this->assertSame(0, \App\Models\Bed::where('occupied', false)->whereNotNull('patient_id')->count());

        $urls = [
            '/', '/statistics',
            '/patients', '/patients?status=discharged', '/patients?status=all', '/patients/create', '/patients/1', '/patients/1/edit',
            '/doctors', '/doctors/create', '/doctors/1', '/doctors/1/edit',
            '/nurses', '/nurses/create', '/nurses/1', '/nurses/1/edit',
            '/beds', '/beds/create', '/beds/1',
            '/assign/assign-doctor', '/assign/assign-patient',
            '/assign/assign-nurse-to-patient', '/assign/assign-patient-to-nurse',
            '/assign/assign-bed-to-patient',
            '/updates', '/update/update-doc', '/update/update-nurse', '/update/update-bed',
        ];

        foreach ($urls as $url) {
            $this->staff()->get($url)->assertOk();
        }
    }

    public function test_unknown_records_return_404(): void
    {
        $this->staff()->get('/patients/999')->assertNotFound();
        $this->staff()->get('/doctors/999')->assertNotFound();
        $this->staff()->get('/beds/999')->assertNotFound();
    }
}
