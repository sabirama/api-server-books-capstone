<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\OrderItem;
use App\Models\PaymentOptions;
use App\Models\Address;

use App\Http\Resources\OrderItemResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $orderItems = OrderItem::whereIn('id',[$this->order_item_id])->get();
        $paymentOption = PaymentOptions::whereIn('id',[$this->payment_option_id])->first();
        $address = Address::whereIn('id',[$this->address_id])->first();

        $orderItemResource = OrderItemResource::collection($orderItems);

        return [
            'id' => $this->id,
            'order_item' => $orderItemResource,
            'payment_option' => $paymentOption,
            'address' => $address,
        ];
    }
}
