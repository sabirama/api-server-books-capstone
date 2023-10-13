<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Book;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'=>fake()->paragraph(1),
            'rate'=>fake()->numberBetween(1,5),
            'book_id'=>Book::pluck('id')->random(),
            'user_id'=>User::pluck('id')->random(),
        ];
    }
}
