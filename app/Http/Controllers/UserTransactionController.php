<?php

namespace App\Http\Controllers;

use App\Booking;
use App\UserTransaction;
use Illuminate\Http\Request;

use Config;

use Session;
use Redirect;


class UserTransactionController extends Controller
{


    public function paymentStatus(Request $request)
    {
        $paymentId = $request->session()->get('paypal_payment_id');
        $bookingId = $request->session()->get('booking_id');
        $booking = Booking::find($bookingId);
        if($booking->final_price != null)
        {
            $amount = $booking->final_price;
        }
        else
        {
            $amount = $booking->price;
        }
        $transID = 'Paypal';
        $userTransaction = new UserTransaction();

        $userTransaction->amount = $amount;
        $userTransaction->booking_id = $bookingId;
        $userTransaction->trans_id = $transID;
        $userTransaction->payment_id = $paymentId;
        $userTransaction->save();
        $booking->confirm = 1 ;
        $booking->user_transaction_id = $userTransaction->id;
        $booking->save();

//        $request->session()->flash('message', 'This is a message!');
//        $request->session()->flash('alert-class', 'alert-success');
//        return redirect()->route('userProfile')->with('message', 'Payment Successful');
        return view('Frontend.Profile.paymentSuccess');

    }

//    public function paymentSuccess()
//    {
//        return view
//    }
    public function cashPayment(Request $request)
    {
        $bookingId = $request->id;
        $booking = Booking::find($bookingId);
        $userTransaction = new UserTransaction();

        $userTransaction->amount = $booking->price;
        $userTransaction->booking_id = $bookingId;
        $userTransaction->trans_id = 'Cash';
        $userTransaction->payment_id = 'Cash';
        $userTransaction->save();
        $booking->confirm = 1 ;
        $booking->user_transaction_id = $userTransaction->id;
        $booking->save();
        return redirect()->route('userProfile');
    }
    /**
 * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTransaction $userTransaction)
    {
        //
    }
}
