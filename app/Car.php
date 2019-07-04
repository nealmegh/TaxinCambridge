<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'size', 'luggage', 'fair', 'description', 'status'
    ];

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

}
