<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'vehicle_reg', 'commission'];

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}
