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
            'submitted_date' => $this->faker->date,
            'ein_number' => $this->faker->unique()->safeEmail,
            'company' => $this->faker->company,
            'contact' => $this->faker->tollFreePhoneNumber,
            'project' => $this->faker->text(10),
            'single' => $this->faker->randomFloat(2,100,99999),
            'aggregate' => $this->faker->randomFloat(2,100,99999),
            'status' => $this->faker->randomFloat(2,100,99999),
        ];
    }

    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => '1',
            ];
        });
    }
    public function submitted()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => '2',
            ];
        });
    }
    public function appreoved()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => '3',
            ];
        });
    }
}
