<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genre = [
                'action',
                'adventure',
                'thriller',
                'slice of life',
                'drama',
                'romance',
                'school',
                'historical',
                'horror',
                'thriller',
                'fantasy',
                'science fiction'
        ];

        // Get a random genre and remove it from the collection
        $randomGenre = array_splice($genre, array_rand($genre), 1)[0];

        return [

            'name' => $randomGenre,
            'details' =>  fake()->sentence(5)
        ];
    }
}
