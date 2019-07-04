<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'display_name'];
    public function airports()
    {
        return $this->belongsToMany('App\Airport')->withPivot( 'price', 'return_price');
    }
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

}
