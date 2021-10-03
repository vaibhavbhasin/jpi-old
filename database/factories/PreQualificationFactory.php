<?php

namespace Database\Factories;

use App\Models\PreQualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreQualificationFactory extends Factory
{
    protected $model = PreQualification::class;

    public function definition(): array
    {
        return [
            'submitted_date' => $this->faker->dateTimeBetween('-2 Years'),
            'ein_number' => $this->faker->randomElement(['75-2544554','']),
            'company' => $this->faker->company,
            'contact' => $this->faker->phoneNumber,
            'project' => $this->faker->text(20,),
            'single' => $this->faker->randomFloat(2, 100, 99999),
            'aggregate' => $this->faker->randomFloat(2, 100, 99999),
            'status' => $this->faker->numberBetween(1, 5),
        ];
    }
}
