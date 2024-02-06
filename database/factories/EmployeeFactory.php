<?php

// EmployeeFactory.php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Fname' => $this->faker->firstName,
            'Lname' => $this->faker->lastName,
            'Email' => $this->faker->unique()->safeEmail,
            'PhoneNumber' => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

