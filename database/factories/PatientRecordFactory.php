<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientRecord>
 */
class PatientRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hospitalId = Hospital::pluck('id')->first();
        $patientId = DB::table('patients')->inRandomOrder()->value('id');
        $bedId = DB::table('beds')->inRandomOrder()->value('id');

        $patient = Patient::find($patientId);
        $dateOfAdmission = $patient->created_at ?? Carbon::now();

        return [
            //
            'hospital_id' => $hospitalId,
            'patient_id' => $patientId,
            'bed_id' => $bedId,
            'date_of_admission'=> $dateOfAdmission,
        ];
    }
}
