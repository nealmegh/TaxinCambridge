<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'driver_id',
        'location_id',
        'airport_id',
        'car_id',
        'from_to',
        'return',
        'journey_date',
        'return_date',
        'pickup_address',
        'dropoff_address',
        'return_pickup_address',
        'return_dropoff_address',
        'flight_number',
        'meet',
        'adult',
        'child',
        'luggage',
        'carryon',
        'price',
        'add_info',
        'pickup_time',
        'return_time',
        'flight_origin',
        'discount_type',
        'discount_value',
        'discount_amount',
        'final_price',
        'return_flight_origin',
        'return_flight_number'
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
    public function userTransaction()
    {
        return $this->hasOne('App\UserTransaction');
    }

    public function invoice()
    {
        return $this->hasone('App\Invoice');
    }
}
