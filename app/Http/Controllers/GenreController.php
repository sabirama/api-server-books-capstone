<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index(Request $request) {
        $pageSize = $request->page_size ?? 100;
        return response([
          'genres'=> Genre::query()->paginate($pageSize)
        ],201);
    }

    //display by name
    public function name(Request $request)
    {
        $pageSize = $request->page_size ?? 100;
        return response([
          'genres'=> Genre::orderBy('name')->paginate($pageSize)
        ],201);

    }

    //individual author
    public function show(Request $request, $id)
    {
        $genre = Genre::find($id);
        return response([
            'genre' => $genre
        ],201);

    }

    //add new author
    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return response([
            'genre' => $genre,
            'message' => 'genre added to database'
        ],201);
    }

    //update
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $newGenre = $genre->update($request->all());

         return response([
            'genre' => $newGenre,
            'message ' => 'genre updated'
        ],201);
    }

    //delete
    public function destroy($id)
    {

        $genre = Genre::find($id);
        $genre->delete();

        return response([
            'genre' => $genre,
            'nessage' => 'file removed'
        ]);
    }
}
