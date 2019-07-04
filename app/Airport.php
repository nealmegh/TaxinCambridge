<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

}
