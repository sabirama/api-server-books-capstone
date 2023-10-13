<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Genre;
use App\Models\Author;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookDetails>
 */
class BookDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'=> fake()->paragraph(1),
            'genre_id'=>Genre::pluck('id')->random(),
            'author_id'=>Author::pluck('id')->random(),
        ];
    }
}
