<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\PaymentOptions;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $orders = Order::whereIn('order_details_id', [$thsi->id])->get();
        $orderItems = OrderItem::whereIn('id', [$thsi->order_details_id])->get();
        $address = Address::whereIn('id', [$thsi->address_id])->get();
        $paymentOptions = PaymentOptions::whereIn('id', [$thsi->payment_options_id])->get();

        return [
            'id'=>$this->id,
            "orders"=>$orders,
            'order_items'=>$orderItems,
            'address'=>$address,
            'payment_options'=>$paymentOptions
        ];
    }
}
