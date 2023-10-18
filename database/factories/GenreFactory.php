<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
use App\Models\BookDetails;
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
    {   $genres = [
        'action',
        'drama',
        'fantasy',
        'sci-fi',
        'adventure',
        'slice of life',
        'thriller',
        'fiction',
        'magic',
        'historical',
        'horror'
    ];

        return [
            'name' =>fake()->randomElement($genres),
            'details' => fake()->sentence(),
            'book_details_id'=>BookDetails::pluck('id')->random(),
        ];
    }
}
