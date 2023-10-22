<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        return [
          'genres'=> Genre::query()->paginate($pageSize)
        ];
    }

    //display by name
    public function name(Request $request)
    {
        $pageSize = $request->page_size ?? 100;
        return [
          'genres'=> Genre::orderBy('name')->paginate($pageSize)
        ];

    }

    //individual author
    public function show(Request $request, $id)
    {
        $genre = Genre::find($id);
        return [
            'genre' => $genre
        ];

    }

    //add new author
    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return [
            'genre' => $genre,
            'message' => 'genre added to database'
        ];
    }

    //update
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->update($request->all());

         return [
            'genre' => $genre,
            'message ' => 'genre updated'
        ];
    }

    //delete
    public function destroy($id)
    {

        $genre = Genre::find($id);
        $genre->delete();

        return [
            'genre' => $genre,
            'nessage' => 'file removed'
        ];
    }
}
