<?php

namespace Database\Seeders;

use App\Models\PreQualification;
use Database\Factories\PreQualificationFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class tempPrequelSeeder extends Seeder
{
    public function run()
    {
        PreQualification::factory()->count(100)->create();
    }
}
