<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Author;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'details' => fake()->paragraph(),
            'author_id' => Author::pluck('id')->random(),
            'genre_id' =>Genre::pluck('id')->random(),
            'price' => fake()->numberBetween(300,2000)
        ];
    }
}
