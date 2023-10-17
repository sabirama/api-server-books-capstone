<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\OrderDetails;
use App\Models\OrderReview;
use App\Models\User;

use App\Http\Resources\OrderDetailsResource;
use App\Http\Resources\UserResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $orderDetails = OrderDetails::find($this->order_details_id)->first();
        $orderReview = OrderReview::whereIn('order_id', [$this->id])->get('id');
        $user = User::whereIn('id',[$this->user_id])->first();

        $orderDetailResource = new OrderDetailsResource($orderDetails);
        $userResource = new UserResource($user);

        return [
            'id' => $this->id,
            'user' => $user,
            'order_details' => $orderDetail,
            'order_review'=> $orderReview,
        ];
    }
}
