<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'branch_id',
        'hall_name',
        'show_time_id',
        'seat_no',
        'user_id',
        'reservation_status',
    ];
}
