<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Order;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderReview>
 */
class OrderReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::pluck('id')->random(),
            'order_id'=>User::pluck('id')->random(),
            'body'=>fake()->paragraph(),
            'rate'=>fake()->numberBetween(1,5)
        ];
    }
}
