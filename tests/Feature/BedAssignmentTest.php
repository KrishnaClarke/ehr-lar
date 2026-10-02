<?php

namespace Tests\Feature;

use App\Models\Bed;

class BedAssignmentTest extends StaffTestCase
{
    public function test_patient_can_be_moved_to_another_free_bed(): void
    {
        $this->ward(2);
        $patient = $this->admit();
        [$old, $new] = [Bed::orderBy('id')->first(), Bed::orderBy('id')->skip(1)->first()];

        $this->staff()->post('/assign/assign-bed-to-patient', [
            'patient_id' => $patient->id,
            'bed_id' => $new->id,
        ])->assertRedirect('/beds');

        $this->assertNull($old->fresh()->patient_id);
        $this->assertFalse($old->fresh()->occupied);
        $this->assertSame($patient->id, $new->fresh()->patient_id);
        $this->assertTrue($new->fresh()->occupied);
        $this->assertDatabaseHas('patient_records', ['patient_id' => $patient->id, 'bed_id' => $new->id]);
    }

    public function test_an_occupied_bed_cannot_be_taken(): void
    {
        $this->ward(2);
        $first = $this->admit();
        $second = $this->admit(['email' => 'second@example.org']);
        $firstBed = Bed::where('patient_id', $first->id)->first();

        $this->staff()->post('/assign/assign-bed-to-patient', [
            'patient_id' => $second->id,
            'bed_id' => $firstBed->id,
        ])->assertSessionHasErrors('bed_id');

        $this->assertSame($first->id, $firstBed->fresh()->patient_id);
    }

    public function test_a_discharged_patient_cannot_be_given_a_bed(): void
    {
        $this->ward(2);
        $patient = $this->admit();
        $this->staff()->post("/patients/{$patient->id}/discharge");

        $this->staff()->post('/assign/assign-bed-to-patient', [
            'patient_id' => $patient->id,
            'bed_id' => Bed::first()->id,
        ])->assertSessionHasErrors('patient_id');
    }

    public function test_a_bed_can_be_freed_without_discharging(): void
    {
        $this->ward(1);
        $patient = $this->admit();
        $bed = Bed::first();

        $this->staff()->post('/update/update-bed', ['bed_id' => $bed->id])->assertRedirect('/beds');

        $this->assertFalse($bed->fresh()->occupied);
        $this->assertNull($bed->fresh()->patient_id);
        $this->assertTrue($patient->fresh()->isAdmitted());
    }

    public function test_freeing_an_empty_bed_is_rejected(): void
    {
        $this->ward(1);

        $this->staff()->post('/update/update-bed', ['bed_id' => Bed::first()->id])->assertSessionHasErrors('bed_id');
    }

    public function test_bed_list_shows_status(): void
    {
        $this->ward(2);
        $this->admit();

        $this->staff()->get('/beds')->assertOk()->assertSee('Occupied')->assertSee('Free')->assertSee('Lovelace');
    }

    public function test_beds_with_history_cannot_be_removed_but_unused_beds_can(): void
    {
        $this->ward(2);
        $this->admit();
        $used = Bed::orderBy('id')->first();
        $unused = Bed::orderBy('id')->skip(1)->first();

        $this->staff()->delete("/beds/{$used->id}")->assertSessionHas('error');
        $this->assertDatabaseHas('beds', ['id' => $used->id]);

        $this->staff()->delete("/beds/{$unused->id}")->assertRedirect('/beds');
        $this->assertDatabaseMissing('beds', ['id' => $unused->id]);
    }
}
