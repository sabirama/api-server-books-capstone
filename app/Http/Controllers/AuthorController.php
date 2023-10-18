<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 200;
        return response([
           'authors' => Author::query()->paginate($pageSize)
        ],201);
    }

    //display by name
    public function name(Request $request)
    {
        $pageSize = $request->page_size ?? 200;
        return response([
           'authors'=> Author::orderBy('pen_name')->paginate($pageSize),
        ],201);
    }

    //individual author
    public function show(Request $request, $id)
    {
        return response([
           'author' => Author::find($id)
        ],201);
    }

    //add new author
    public function store(Request $request)
    {
        $author = Author::create($request->all());
        return response([
           'author'=>  $author,
           'message'=> 'author added to database'
        ],201);
    }

    //update
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $newAuthor = $author->update($request->all());
        return response([
                $newAuthor,
                'file updated'
            ]);
    }

    //delete
    public function destroy($id)
    {

        $author = Author::find($id);
        $author->delete();

        return response([
            $author,
            'file removed'
        ]);

    }
}
