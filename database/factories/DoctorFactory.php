<?php

namespace Database\Factories;

use App\Models\Hospital;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Doctor> */
class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hospital_id' => fn () => Hospital::query()->value('id') ?? Hospital::factory()->create()->id,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'date_of_birth' => fake()->dateTimeBetween('-65 years', '-21 years')->format('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
