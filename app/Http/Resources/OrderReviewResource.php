<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\User;
use App\Models\Book;
use App\Models\OrderReview;

class OrderReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $book = Book::whereIn("id", [$this->book_id])->get(['id','title','price']);
        $user = User::whereIn("id", [$this->user_id])->get(['id', 'first_name','last_name', 'username']);
        $reviews = OrderReview::whereIn('book_id',[$this->book_id])->whereIn('user_id',[$this->user_id])->get(['id','body', 'rate', 'created_at', 'updated_at']);

         return [
            'book'=> $book,
            'user'=> $user,
            'order_reviews' => $reviews

        ];
    }
}
