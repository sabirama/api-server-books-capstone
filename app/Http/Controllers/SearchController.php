<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class SearchController extends Controller
{
    public function search(Request $request) {

        $books = Book::where('title', 'LIKE','%'.$request->search.'%')->get();
        $authors = Author::where('pen_name', 'LIKE','%'.$request->search.'%')->get();

        return [$books, $authors];
    }
}
