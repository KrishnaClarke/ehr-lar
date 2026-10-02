<?php

namespace Tests\Feature;

use App\Models\Bed;
use App\Models\Patient;
use App\Models\Ward;
use App\Services\PatientFlow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class StaffTestCase extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['ehr.admin_user' => 'staff', 'ehr.admin_password' => 'secret']);
    }

    /** Make requests as logged-in staff. */
    protected function staff(): static
    {
        return $this->withHeaders(['Authorization' => 'Basic '.base64_encode('staff:secret')]);
    }

    /** One ward with $beds free beds. */
    protected function ward(int $beds = 2): Ward
    {
        $ward = Ward::factory()->create(['name' => 'Test Ward']);
        Bed::factory()->count($beds)->create(['ward_id' => $ward->id]);

        return $ward;
    }

    protected function admit(array $overrides = []): Patient
    {
        return app(PatientFlow::class)->admit($overrides + [
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'date_of_birth' => '1980-01-01',
            'email' => 'ada@example.org',
        ]);
    }
}
