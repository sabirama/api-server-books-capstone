<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index() {
        return Genre::query()->paginate(200);
    }

    //display by name
    public function name(Request $request)
    {
        return Genre::orderBy('name')->paginate(200);
    }

    //individual author
    public function show(Request $request, $id)
    {
        return Genre::find($id);
    }

    //add new author
    public function store(Request $request)
    {
        return Genre::create($request->all());
    }

    //update
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->update($request->all());
    }

    //delete
    public function destroy($id)
    {
        if(Genre::where('id',$id)) {
            $genre = Genre::find($id);
            $genre->delete();

            return [$genre, 'file removed'];
        }
    }
}
