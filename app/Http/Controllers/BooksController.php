<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;

use App\Models\BookReview;
use App\Models\BookDetails;
use App\Models\UserResource;

class BooksController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 150;
        $title= $request->book_title ?? null;
        $books = Book::query()->paginate($pageSize);

        return BookResource::collection($books);

    }


    //display latest
    public function latest(Request $request)
    {

        $pageSize = $request->page_size ?? 100;
        $books = Book::orderBy('created_at', 'desc')->paginate($pageSize);

        return ['books' =>BookResource::collection($books)];

    }

    //display by name
    public function name(Request $request)
    {

        $pageSize = $request->page_size ?? 100;
        $books =  Book::orderBy('title')->paginate($pageSize);

        return ['books' => BookResource::collection($books)];

    }

    //individual book
    public function show(Request $request, $id)
    {
        $book = Book::find($id);

        return ['books' => new BookResource($book)];


    }

    //add new book
    public function store(Request $request)
    {   $book = Book::create($request->all());

        return [
            'book'=>$book,
            'message'=>'book added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return [$books , 'book updated'];
    }

    //delete
    public function destroy($id)
    {

        $book = Book::find($id);
        $book->delete();

        return [$book, 'file removed'];

    }

}
