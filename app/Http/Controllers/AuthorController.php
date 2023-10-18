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
        return Author::orderBy('pen_name')->paginate($pageSize);

    }

    //individual author
    public function show(Request $request, $id)
    {

        return Author::find($id);

    }

    //add new author
    public function store(Request $request)
    {
        $author = Author::create($request->all());
        return [
           'author'=>  $author,
           'message'=> 'author added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $newAuthor = $author->update($request->all());
        return [
                $newAuthor,
                'file updated'
            ];
    }

    //delete
    public function destroy($id)
    {

        $author = Author::find($id);
        $author->delete();

        return [
            $author,
            'file removed'
        ];

    }
}
