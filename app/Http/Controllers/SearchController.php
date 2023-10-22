<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class SearchController extends Controller
{

    public function book(Request $request, $search) {
        $pageSize= $request->page_size ?? 50;
        $books = Book::whereIn('title', [$search])->paginate($pageSize);

        return ['books'=>$books];
    }

    public function author(Request $request, $search) {
        $pageSize= $request->page_size ?? 50;
        $authors = Author::whereIn('pen_name',[$search])->paginate($pageSize);

        return ['author' => $authors];
    }


}


