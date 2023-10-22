<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class SearchController extends Controller
{

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


