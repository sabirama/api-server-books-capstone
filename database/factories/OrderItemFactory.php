<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Book;
use App\Models\OrderDetails;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        //Create a declaration for atrribute quantity
        $quantity = fake()->numberBetween(1, 20);
        $book = Book::inRandomOrder()->first();
        $price = $book->price*$quantity;

        return [
            'order_details_id'=> OrderDetails::pluck('id')->random(),
            'book_id' => $book->id,
            'quantity' => $quantity,
            'price_total' => $price,
        ];
    }
}
