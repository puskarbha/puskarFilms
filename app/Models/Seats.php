<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Seats extends Model
{
    use HasFactory;
    use SoftDeletes;
     protected $fillable = ['hall_id','seat_name'];

}
