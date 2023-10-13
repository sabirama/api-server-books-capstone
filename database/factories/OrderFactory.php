<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\OrderItem;
use App\Models\PaymentOptions;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orderItem = OrderItem::inRandomOrder()->first();
        return [
            'user_id' => User::pluck('id')->random(),
            'order_item_id' => $orderItem->id,
            'payment_options_id' => PaymentOptions::pluck('id')->random(),
            'address_id' => Address::pluck('id')->random(),
            'price_total'=>$orderItem->price_total
        ];
    }
}
