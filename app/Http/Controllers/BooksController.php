<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index() {
        return Book::all();
    }

    //display latest
    public function latest(Request $request)
    {
        return Book::orderBy('created_at', 'desc')->get();
    }

    //display by name
    public function name(Request $request)
    {
        return Book::orderBy('name')->get();
    }

    //individual book
    public function show(Request $request, $id)
    {
        return Book::find($id);
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
