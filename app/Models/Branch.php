<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'manager_id', 'address','halls'];

    public function manager(){
        return $this->belongsTo(User::class);
    }

    public function showtime(){
        return $this->hasMany(ShowTime::class);
    }

    public function halls(){
        return $this->hasMany(Hall::class);
    }
}
