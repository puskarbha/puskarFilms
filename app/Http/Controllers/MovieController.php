<?php

namespace App\Http\Controllers;


use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movieList()
    {
        $movies=Movie::all();
        return view('admin.movieList', compact('movies'));

    }
public function pushMovie(Request $request){
        $movie=new Movie();
        $movie->name=input('name');
        $movie->cast=input('cast');
        $movie->director=input('director');
        $movie->genre=input('language');
        $movie->language=input('description');
        $movie->description=input('');
}

    public function deleteMovie($id)
    {
        Movie::find($id)->delete();
        return redirect('/movies-list')->with('message', '');
    }
}
