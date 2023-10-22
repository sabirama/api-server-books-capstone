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
        $searchValue = ['books' =>$books, 'authors' => $authors ];

        return $searchValue;
    }

    public function specificSearch(Request $request) {
        $pageSize= $request->page_size ?? 50;
        $books = Book::whereIn('title',[$request->search])->paginate($pageSize);
        $authors = Author::whereIn('pen_name',[$request->search])->paginate($pageSize);
        $searchValue = ['books' =>$books, 'authors' => $authors ];

        return $searchValue;
    }

    public function searchBook(Request $request) {
        $pageSize= $request->page_size ?? 50;
       $books = Book::where('title', 'LIKE','%'.$request->search.'%')->paginate($pageSize);
        $searchValue = ['books' =>$books,];

        return $searchValue;
    }

    public function searchAuthor(Request $request) {
        $pageSize= $request->page_size ?? 50;
        $authors = Author::where('pen_name', 'LIKE','%'.$request->search.'%')->paginate($pageSize);
        $searchValue = ['author' =>$authors,];

        return $searchValue;
    }
}


