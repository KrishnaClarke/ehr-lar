<?php

namespace Database\Factories;

use App\Models\Hospital;
use App\Models\Nurse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nurse>
 */
class NurseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nurse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hospitalId = Hospital::pluck('id')->first();
        return [
            'hospital_id' => $hospitalId,
            'first_name' => $this->faker->firstName($gender = 'male'|'female'),
            'last_name'=>$this->faker->lastName(),
            'date_of_birth' => $this->faker->date("Y-m-d"),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
