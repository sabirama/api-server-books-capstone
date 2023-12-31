<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Book;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $book = Book::whereIn('id',[$this->book_id])->get(["id","title","price"]);

        return [
            'id' => $this->id,
            'cart_id'=>$this->cart_id,
            'quantity' => $this->quantity,
            'price_total' => $this->price_total,
            'book' => $book,
        ];
    }
}
