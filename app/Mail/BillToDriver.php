<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class BillToDriver extends Mailable
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
        $bill = $this->data['bill'];

        $url = Storage::url('csv/'.$bill->id.'.pdf');
        return $this->from('no_reply@taxiincambridge.com')->cc('info@taxiincambridge.co.uk')->subject('New Bill Generated 
        @ Taxi In Cambridge')->view('Email.billGenerated')->attach(public_path().'/'.$url)->with('data', $this->data);
    }
}
