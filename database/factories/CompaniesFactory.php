<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'company_type' => $this->faker->randomKey(['L.L.C', 'Corporation', 'Individual', 'Partnership', 'Joint Venture']),
            'created_date' => $this->faker->dateTimeBetween('-2 Years'),
            'region' => $this->faker->randomKey(['Dallas', 'Austin', 'Houston', 'San Antonio'])
        ];
    }
}
