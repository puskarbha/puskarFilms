<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShowTime extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'movie_id',
        'duration',
        'hall_id',
        'date',
        'time',
        'status',

    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function hall(){
        return $this->belongsTo(Hall::class);
    }
}
