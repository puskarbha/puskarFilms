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
        'branch_id',
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
}
