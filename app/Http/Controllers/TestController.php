<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class TestController extends Controller
{

      public function index(Request $request) {
        $pageSize= $request->page_size ?? 50;
        $val = $request->val;
        $authors = Author::where('pen_name','LIKE',[$val])->paginate($pageSize);
        $books = Book::where('title','LIKE',[$val])->paginate($pageSize);

        return ['author' => $authors, 'books'=> $books];
    }


    public function book(Request $request, $val) {
        $pageSize= $request->page_size ?? 50;
        $books = Book::whereIn('title', [$search])->paginate($pageSize);

        return ['books'=>$books];
    }

    public function author(Request $request, $search) {
        $pageSize= $request->page_size ?? 50;
        $authors = Author::whereIn('pen_name',[$val])->paginate($pageSize);

        return ['author' => $authors];
    }

}


