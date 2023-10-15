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
    public function index() {

        $books = Book::query()->paginate(50);
       return BookResource::collection($books);

    }

    //display latest
    public function latest(Request $request)
    {
        return Book::orderBy('created_at', 'desc')->paginate(50);
    }

    //display by name
    public function name(Request $request)
    {
        return Book::orderBy('name')->paginate(50);
    }

    //individual book
    public function show(Request $request, $id)
    {
        $book = Book::find($id);
        return new BookResource($id);
    }

    //add new book
    public function store(Request $request)
    {
        return Book::create($request->all());
    }

    //update
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
    }

    //delete
    public function destroy($id)
    {
        if(Book::where('id',$id)) {
            $book = Book::find($id);
            $book->delete();

            return [$book, 'file removed'];
        }
    }

}
