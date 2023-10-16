<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\OrderReview;
use App\Models\OrderDetails;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::whereIn('id',[$this->user_id])->get(['first_name', 'last_name']);
        $orderReview = OrderReview::whereIn('order_id',[$this->id])->get();
        $orderDetails = OrderDetails::whereIn('id',[$this->order_details_id])->get();

        return [
            'id'=>$this->id,
            'user'=>$user,
            'order_details'=>$orderDetails,
            'order_review' => $orderReview
        ];
    }
}
