<?php

namespace Database\Factories;

use App\Models\Bed;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Bed> */
class BedFactory extends Factory
{
    public function definition(): array
    {
        return [
            'ward_id' => fn () => Ward::query()->inRandomOrder()->value('id') ?? Ward::factory()->create()->id,
            'patient_id' => null,
            'occupied' => false,
        ];
    }
}
