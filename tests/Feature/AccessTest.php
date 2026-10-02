<?php

namespace Tests\Feature;

class AccessTest extends StaffTestCase
{
    public function test_home_page_is_public(): void
    {
        $this->get('/')->assertOk()->assertSee('EHR-Health');
    }

    public function test_patient_pages_require_staff_login(): void
    {
        foreach (['/statistics', '/patients', '/patients/create', '/doctors', '/nurses', '/beds', '/updates'] as $url) {
            $this->get($url)->assertStatus(401);
        }
    }

    public function test_wrong_password_is_rejected(): void
    {
        $this->withHeaders(['Authorization' => 'Basic '.base64_encode('staff:nope')])
            ->get('/patients')->assertStatus(401);
    }

    public function test_pages_are_locked_when_credentials_are_not_configured(): void
    {
        config(['ehr.admin_user' => null, 'ehr.admin_password' => null]);

        $this->staff()->get('/patients')->assertStatus(403);
    }

    public function test_state_changing_routes_are_also_protected(): void
    {
        $this->ward();
        $patient = $this->admit();

        $this->post("/patients/{$patient->id}/discharge")->assertStatus(401);
        $this->assertTrue($patient->fresh()->isAdmitted());
    }
}
