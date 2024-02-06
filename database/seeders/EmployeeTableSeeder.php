<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfEmployees = 10;

        // Create employees
        Employee::factory($numberOfEmployees)->create();
    }
}
