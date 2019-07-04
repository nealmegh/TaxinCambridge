<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [ 'booking_id',
        'booking_date',
        'pick_up',
        'drop_off',
        'driver_name',
        'driver_phone',
        'customer_name',
        'customer_phone',
        'customer_email',
        'payment_type',
        'status',
        'total_amount',
        'booking_from',
        'booking_to',
        ];

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }

    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }

}
