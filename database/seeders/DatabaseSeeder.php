<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            HospitalSeeder::class,
            WardSeeder::class,
            BedSeeder::class,
            DoctorSeeder::class,
            NurseSeeder::class,
            PatientSeeder::class,
            PatientRecordSeeder::class,
        ]);
    }
}
