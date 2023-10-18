<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\BookDetails;
use App\Models\BookReview;
use App\Models\ImageMedia;
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
        $image = ImageMedia::whereIn('image_type',['book_image'])->whereIn('associated_id', [$this->id])->get() ?? null;
        $bookDetailsResource = new BookDetailsResource($bookDetails);
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'book_details' => $bookDetailsResource,
            'book_image' => $image
        ];
    }
}
