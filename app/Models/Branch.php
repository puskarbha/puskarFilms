<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'manager_id', 'address'];

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
