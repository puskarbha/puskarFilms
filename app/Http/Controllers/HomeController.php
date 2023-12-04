<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Movie;
use App\Models\Seats;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $comingMovies=ShowTime::where('status','Coming_soon')->get();
        $nowShowings=ShowTime::where('status','Showing_now')->get();
        $branches=Branch::all();
        return view('home.dashboard',compact('nowShowings','comingMovies','branches'));
    }
    public function movieDetails($id){
        $movieday0 = ShowTime::where('date', now()->format('Y-m-d'))->where('movie_id',$id)->get();
        $movieday1 = ShowTime::where('date', now()->addDay(1)->format('Y-m-d'))->where('movie_id',$id)->get();
        $movieday2 = ShowTime::where('date', now()->addDay(2)->format('Y-m-d'))->where('movie_id',$id)->get();
        $movieday3 = ShowTime::where('date', now()->addDay(3)->format('Y-m-d'))->where('movie_id',$id)->get();

        $branches=Branch::all();//for footer
        $movie=Movie::findOrFail($id);
        return view('home.movieDetails',compact('movie','branches','movieday0','movieday1','movieday2','movieday3'));
    }


    public function hall_seats($show_id){
        $branches=Branch::all(); // for footer
        $show=ShowTime::findOrFail($show_id);
        $seats=Seats::where('branch_id',$show->branch_id)->where('hall_name',$show->hall)->get();
        return view('home.seats',compact('seats','branches','show'));
    }




}
