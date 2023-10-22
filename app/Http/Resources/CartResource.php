<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\User;
use App\Models\OrderItem;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::whereIn('id', [$this->user_id])->first([ "first_name","last_name","username"]);
        $orderItems = OrderItem::whereIn('cart_id', [$this->id])->get();
        $orderItemResource =  OrderItemResource::collection($orderItems);
        return [
            'id' => $this->id,
            'user'=> $user,
            'order_items' => $orderItemResource
        ];
    }
}
