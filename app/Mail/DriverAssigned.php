<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverAssigned extends Mailable
{
    use Queueable, SerializesModels;

public $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('no_reply@taxiincambridge.com')->subject('You have been Assigned 
        to A new Booking')->view('Email.driverAssigned')->with('data', $this->data);

    }
}
