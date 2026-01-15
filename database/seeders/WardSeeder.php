<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    private array $wardNames = ['Pediatrics', 'Delivery', 'Intensive Care', 'Psych', 'Orthopedics'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->wardNames as $wardName) {
            DB::table('wards')->insert([
                'name' => $wardName,
                'hospital_id' => Hospital::all()->first()->id,
            ]);
        }
    }
}
