<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::insert([
            ['id' => 1, 'name' => 'Nafsirudin', 'position' => 'Developer'],
            ['id' => 2, 'name' => 'Putri', 'position' => 'Designer'],
        ]);
    }
}
