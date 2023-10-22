<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $books = Book::where('title', 'LIKE','%'.$request->search.'%')->get();
        $authors = Author::where('pen_name', 'LIKE','%'.$request->search.'%')->get();

        return  [
            'books' => $books,
            'authors' => $authors
        ];
    }
}
