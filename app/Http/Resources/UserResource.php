<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Order;
use App\Models\BookReview;
use App\Models\OrderReview;
use App\Http\Resources\OrderResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $orders = Order::whereIn('user_id', [$this->id])->get();
        $bookReviews = BookReview::whereIn('user_id', [$this->id])->get();
        $orderReviews = OrderReview::whereIn('user_id', [$this->id])->get();

        return [
            'id'=> $this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'username'=>$this->username,
            'email'=>$this->email,
            'gender'=>$this->gender,
            'birthdate'=>$this->birthdate,
            'orders'=> OrderResource::collection($orders),
            'book_reviews'=>$bookReviews,
            'order_reviews'=>$orderReviews,
        ];
    }
}
