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
        $pageSize = $request->page_size ?? 200;
        $books = Book::query()->paginate($pageSize);

        return response([
            'books' =>  BookResource::collection($books),
        ],201);


    }

    //display latest
    public function latest(Request $request)
    {

        $pageSize = $request->page_size ?? 200;
        $books = Book::orderBy('created_at', 'desc')->paginate($pageSize);
        return response([
            'books' =>  BookResource::collection($books),
        ],201);
    }

    //display by name
    public function name(Request $request)
    {

        $pageSize = $request->page_size ?? 200;
        $books =  Book::orderBy('title')->paginate($pageSize);
        return response([
            'books' =>  BookResource::collection($books),
        ],201);
    }

    //individual book
    public function show(Request $request, $id)
    {
        $book = Book::find($id);
        return response([
            'books' =>  new BookResource($book),
        ],201);

    }

    //add new book
    public function store(Request $request)
    {   $book = Book::create($request->all());

        return response([
            'book'=>$book,
            'message'=>'book added to database'
        ]);
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
