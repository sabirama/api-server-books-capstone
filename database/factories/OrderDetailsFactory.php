<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\OrderItem;
use App\Models\PaymentOptions;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_item_id' => OrderItem::pluck('id')->random(),
            'payment_options_id' => PaymentOptions::pluck('id')->random(),
            'address_id' => Address::pluck('id')->random(),
        ];
    }
}
