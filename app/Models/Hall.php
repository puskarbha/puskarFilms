<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Hall extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['branch_id', 'hall_name'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function show()
    {
        $this->hasMany(ShowTime::class);
    }


}
