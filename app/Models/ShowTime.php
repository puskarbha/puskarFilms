<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'duration',
        'time',
        'status',

    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
