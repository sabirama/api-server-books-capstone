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

        return response($searchValue);
    }

     public function searchFor(Request $request, $search) {
        $pageSize= $request->page_size ?? 50;
        $books = Book::where('title', 'LIKE','%'.$search.'%')->paginate($pageSize);
        $authors = Author::where('pen_name', 'LIKE','%'.$search.'%')->paginate($pageSize);
        $searchValue = ['books' =>$books, 'authors' => $authors ];

        return response($searchValue);
    }

    public function searchForBook(Request $request, $search) {
        $pageSize= $request->page_size ?? 50;
        $books = Book::whereIn('title', [$search])->paginate($pageSize);
        $searchValue = ['books' =>$books, ];

        return response($searchValue);
    }

    public function searchForAuthor(Request $request, $search) {
        $pageSize= $request->page_size ?? 50;
        $authors = Author::whereIn('pen_name',[ $search])->paginate($pageSize);
        $searchValue = [ 'authors' => $authors ];

        return response($searchValue);
    }


}


