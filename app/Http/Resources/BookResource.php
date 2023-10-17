<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\BookDetails;
use App\Models\BookReview;
use App\Http\Resources\BookDetailsResource;

class BookResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $bookDetails = BookDetails::whereIn('book_id',[$this->id])->first();
        $bookDetailsResource = new BookDetailsResource($bookDetails);
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'book_details' => $bookDetails,
        ];
    }
}
