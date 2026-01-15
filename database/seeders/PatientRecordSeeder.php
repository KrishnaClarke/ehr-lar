<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hospital;
use App\Models\Bed;
use App\Models\PatientRecord;
use Illuminate\Support\Carbon;


class PatientRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Retrieve data from existing tables
          $hospitalData = Hospital::all();
          $patientData = Patient::all();
          $bedData = Bed::all();
  
          // Loop through the retrieved data and create patient records
          foreach ($patientData as $patient) {
              $hospital = $hospitalData->random();
              $bed = $bedData->random();

              $dateOfAdmission = $patient->created_at ?? Carbon::now();
  
              PatientRecord::create([
                  'hospital_id' => $hospital->id,
                  'patient_id' => $patient->id,
                  'bed_id' => $bed->id,
                  'date_of_admission' =>  $dateOfAdmission,
                  'date_of_release' => null,
              ]);
          }
    }
}
