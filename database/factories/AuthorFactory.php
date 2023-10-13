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
            'pen_name' => fake()->name(1),
            'first_name'=> fake()->name(1),
            'last_name'=> fake()->name(1),
            'details'=> fake()->paragraph(200)
        ];
    }
}
