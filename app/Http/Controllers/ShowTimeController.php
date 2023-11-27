<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowTimeRequest;
use App\Models\Movie;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show_times=ShowTime::latest()->paginate(7);
        return view('admin.ShowTime.ShowTimeList',compact('show_times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        return view('admin.ShowTime.addShowTime',compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowTimeRequest $request)
    {
        $validatedData = $request->validated();
        $showTime = new ShowTime($validatedData);
        $showTime->save();
        return redirect()->route('show_times.index')->with('message', 'ShowTime created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $showTime=ShowTime::findOrFail($id);
        $movies=Movie::all();
        return view('admin.ShowTime.editShowTime',compact('showTime','movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShowTimeRequest $request,  $id)
    {

        $showTime=ShowTime::findOrFail($id);
        $validatedData = $request->validated();
        $showTime->update($validatedData);
        return redirect()->route('show_times.index')->with('message','ShowTime updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ShowTime::findOrFail($id)->delete();
        return redirect()->route('show_times.index')->with('message','ShowTime deleted successfully');
    }
}