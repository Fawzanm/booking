<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $guarded = [];

    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function booking()
    {
        return $this->hasMany(Booking::class);
    }


}
