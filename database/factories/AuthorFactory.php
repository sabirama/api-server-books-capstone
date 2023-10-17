<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pen_name' => fake()->firstname(),
            'first_name'=> fake()->firstname(),
            'last_name'=> fake()->lastname(),
            'details'=> fake()->paragraph(2)
        ];
    }
}
