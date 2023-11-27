<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cast', 'director', 'genre', 'language', 'description', 'thumbnail'];
    public function showTimes()
    {
        return $this->hasMany(ShowTime::class);
    }
}
