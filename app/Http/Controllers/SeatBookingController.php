<?php

namespace App\Http\Controllers;


use App\Http\Requests\SeatBookingRequest;
use App\Models\Branch;
use App\Models\SeatBooking;
use App\Models\Seats;
use App\Models\ShowTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class SeatBookingController extends Controller
{

    use Notifiable;
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
    public function store(SeatBookingRequest $request)
    {

        $validated = $request->validated();
        $show = ShowTime::findOrFail($validated['show_time_id']);

        foreach ($validated['seats'] as $seatId) {
            $seat = Seats::findOrFail($seatId);
            $seat_booking = new seatBooking();
            $seat_booking->fill([
                'movie_id' => $show->movie_id,
                'hall_id' => $show->hall_id,
                'show_time_id' => $validated['show_time_id'],
                'seat_id' => $seatId,
                'user_id' => auth()->user()->id,
                'reservation_status' => "reserved",
            ]);
        $seat_booking->save();
            //for Notifications
            $managerID=$seat_booking->hall->branch->manager_id;
            $manager=User::findOrFail($managerID);
            $manager->notify($seat_booking);

        $seatBookings[] = $seat_booking;
        }
        //for Email
      $user=auth()->user();
        Mail::send('emails.ticketConfirmation', ['seatBookings' => $seatBookings,'user'=>$user], function ($message)  use ($user){
            $message->to($user->email, $user->name)
                ->subject('SeatBooked');
        });


        return redirect()->route('home')->with('message', 'Ticket reserved successfully');
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
