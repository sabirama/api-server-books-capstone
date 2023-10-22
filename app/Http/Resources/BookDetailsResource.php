<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Genre;
use App\Models\Author;

class BookDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $genres = Genre::whereIn('book_details_id',[$this->id])->get('name');
        $author = Author::whereIn('id',[$this->author_id])->get(['pen_name','first_name', 'last_name']);

        return [
            'id'=> $this->id,
            'body'=> $this->body,
            'genres' => $genres,
            'author' => $author,
        ];

    }
}
