<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->firstName(),
            "phone" => fake()->phoneNumber(),
            "email" => fake()->safeEmail(),
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "blood_type_id" => 1,
            "last_donation_date" => fake()->date(),
            "city_id" => 1,
            "pin_code" => 45245,
            "date_of_birth" => fake()->date(),
        ];
    }
}
