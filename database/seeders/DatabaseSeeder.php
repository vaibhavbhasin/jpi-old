<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'employee']);
        $employee = User::create([
            'firstname' => 'Test',
            'lastname' => 'Employee',
            'email' => 'testemp@jpi.com',
            'password' => Hash::make('TestEmp@#2021!')
        ]);
        $employee->assignRole('employee');
        $admin = User::create([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'super@jpi.com',
            'password' => Hash::make('SuperAdmin@#2021!')
        ]);
        $admin->assignRole('admin');
    }
}
