<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class SearchController extends Controller
{
    public function search(Request $request) {
        $pageSize= $request->page_size ?? 50;
        $books = Book::where('title', 'LIKE','%'.$request->search.'%')->paginate($pageSize);
        $authors = Author::where('pen_name', 'LIKE','%'.$request->search.'%')->paginate($pageSize);

        return ['books'=>$books, 'authors'=>$authors];
    }
}
