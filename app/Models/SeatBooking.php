<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SeatBooking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'movie_id',
        'branch_id',
        'hall_id',
        'show_time_id',
        'seat_id',
        'user_id',
        'reservation_status',
    ];
}
