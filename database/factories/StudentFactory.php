<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'country' => fake()->country,
            'city' => fake()->city,
            'email' => fake()->unique()->email,
            'phone_number' => fake()->phoneNumber,
            'information' => fake()->text,
        ];
    }
}
