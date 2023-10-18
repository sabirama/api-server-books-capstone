<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;
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
            'book_id'=>  fake()->unique()->numberBetween(1, 100),
            'author_id'=>Author::pluck('id')->random(),
        ];
    }
}
