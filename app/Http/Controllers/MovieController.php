<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $rules = [
        'name' => 'required|string|max:255',
        'cast' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'language' => 'required|string|max:255',
        'duration' => 'required|integer',
        'description' => 'nullable|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(5);
        return view('admin.Movie.movieList', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Movie.addMovie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules);
        $movie = new Movie();
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/Movies'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }
        $movie->fill($validatedData);
        $movie->save();
        return redirect()->route('movies.index')->with('message','Movie added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.Movie.editMovie', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $movie = Movie::findOrFail($id);
        $validatedData = $request->validate($this->rules);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/Movies'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        } else {
            $validatedData['thumbnail'] = $movie->thumbnail;
        }



        $movie->update($validatedData);
        return redirect()->route('movies.index')->with('message','Movie Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
        Movie::findOrFail($id)->delete();
        return redirect()->route('movies.index')->with('message', 'Movie deleted successfully');
    }
}
