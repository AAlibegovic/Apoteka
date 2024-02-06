<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'Fname' => $this->faker->firstName(),
        'Lname' => $this->faker->lastName(),
        'Email' => $this->faker->email(),
        'PhoneNumber' => $this->faker->phoneNumber(),
        ];
    }
}
