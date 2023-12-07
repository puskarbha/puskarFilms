<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\SeatBooking;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class SeatBookingController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'show_time_id' => 'required|exists:show_times,id',
            'seat' => 'required|array|min:1|max:5',
            'seat.*' => 'required|string',
        ]);


        $show = ShowTime::findOrFail($validated['show_time_id']);
        $validated['movie_id'] = $show->movie_id;
        $validated['branch_id'] = $show->branch_id;
        $validated['hall_name'] = $show->hall;
        $validated['user_id'] = auth()->user()->id;
        $validated['reservation_status'] = "reserved";

        foreach ($validated['seat'] as $seat) {
            $seat_booking = new seatBooking();
            $seat_booking->fill([
                'movie_id' => $validated['movie_id'],
                'branch_id' => $validated['branch_id'],
                'hall_name'=> $validated['hall_name'],
                'show_time_id' => $validated['show_time_id'],
                'seat_no' => $seat,
                'user_id' => $validated['user_id'],
                'reservation_status' => $validated['reservation_status'],
            ]);

            
            $seat_booking->save();
        }
        return redirect()->route('home')->with('message','Ticket reserved successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
