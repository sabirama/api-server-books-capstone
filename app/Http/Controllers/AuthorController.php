<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index() {
        return Author::query()->paginate(200);
    }

    //display by name
    public function name(Request $request)
    {
        return Author::orderBy('pen_name')->paginate(200);
    }

    //individual author
    public function show(Request $request, $id)
    {
        return Author::find($id);
    }

    //add new author
    public function store(Request $request)
    {
        return Author::create($request->all());
    }

    //update
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->update($request->all());
    }

    //delete
    public function destroy($id)
    {
        if(Author::where('id',$id)) {
            $author = Author::find($id);
            $author->delete();

            return [$author, 'file removed'];
        }
    }
}
