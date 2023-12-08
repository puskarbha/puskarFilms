<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\SeatBooking;
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
        $movieDay0 = ShowTime::where('date', now()->format('Y-m-d'))->where('movie_id',$id)->get();
        $movieDay1 = ShowTime::where('date', now()->addDay(1)->format('Y-m-d'))->where('movie_id',$id)->get();
        $movieDay2 = ShowTime::where('date', now()->addDay(2)->format('Y-m-d'))->where('movie_id',$id)->get();
        $movieDay3 = ShowTime::where('date', now()->addDay(3)->format('Y-m-d'))->where('movie_id',$id)->get();

        $branches=Branch::all();//for footer
        $movie=Movie::findOrFail($id);
        return view('home.movieDetails',compact('movie','branches','movieDay0','movieDay1','movieDay2','movieDay3'));
    }


    public function hall_seats($show_id){

        $branches=Branch::all(); // for footer
        $show=ShowTime::findOrFail($show_id);
        $seats=Seats::where('hall_id',$show->hall_id)->get();
        $booked_seats=SeatBooking::where('show_time_id', $show_id)->pluck('seat_id');//fetch booked seat list

        return view('home.seats',compact('seats','branches','show','booked_seats'));
        }

}
