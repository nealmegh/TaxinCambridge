<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $fillable = [
        'amount', 'trans_id', 'payment_id', 'booking_id',
    ];

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }

}
