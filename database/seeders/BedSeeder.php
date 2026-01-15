<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wardCount = Ward::all()->count();
        Bed::factory()
        ->count($wardCount * 5)
        ->create([
            'patient_id' => null,
        ]);
        
    }
}
