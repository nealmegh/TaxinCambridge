<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Booking;
use App\Car;
use App\Driver;
use App\Invoice;
use App\Location;
use App\Mail\BookingUpdated;
use App\SiteSettings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\BookingSuccessful;
use Illuminate\Support\Facades\Mail;
use App\Mail\DriverAssigned;
use Illuminate\Support\Facades\Redirect;


class BookingController extends Controller
{

    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('Backend.Booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $locations = Location::all();
        $airports = Airport::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'customer');
        })->get();


        return view('Backend.Booking.create', compact('cars', 'locations', 'airports', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $journey_date = strtotime($request->journey_date);
//        $journey_date = date('m-d-Y',$journey_date);
//        $pickup_time = strtotime($request->pickup_time);
////        $pickup_time = time('h:m A',$pickup_time);
//        dd($pickup_time);
//dd($request);
        $car = Car::find($request->car_id);
        $siteSettings = SiteSettings::all();
        $meetValue = round($siteSettings[0]->value,2);

        $to = $request->selectTo;

        $fromString = $request->selectFrom;
        $maintain = mb_substr($fromString, 0, 3);
        $from = substr($fromString, 3);
        $price = 0;
        $returnPrice = 0;
        $meetPrice = 0;
        $carPrice = round($car->fair, 2);

        $totalPrice = 0;
        $discount = 0;
        $finalPrice = 0;
        $request->request->add(['from_to' => $maintain]);
        if($maintain == 'loc')
        {
            $location = Location::find($from);
            $request->request->add(['location_id' => $from]);
            $request->request->add(['airport_id' => $to]);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $to)
                {

                    $price = round($airport->pivot->price,2);
                    $returnPrice = round($airport->pivot->return_price, 2);
                }
            }
        }
        else
        {
            $location = Location::find($to);
            $request->request->add(['airport_id' => $from]);
            $request->request->add(['location_id' => $to]);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $from)
                {

                    $price = round($airport->pivot->return_price,2);
                    $returnPrice = round($airport->pivot->price, 2);
                }
            }
        }
        if($car->fair == 500)
        {
            $carPrice = $price*.5;
        }
        if($request->return == 1)
        {
            $carPrice = $carPrice*2;

        }
        else
        {
            $returnPrice = 0;
        }
        if($request->meet == 1)
        {
            $meetPrice = $meetValue;
        }

        $totalPrice = $meetPrice + $price + $carPrice + $returnPrice;
        $totalPrice = round($totalPrice, 2);

        if($request->discount_value>0)
        {
            if($request->discount_type == 0)
            {
                $discount = $request->discount_value;
            }
            else
            {
                $discount = $totalPrice*($request->discount_value/100);
            }

        }

        $finalPrice = $totalPrice - $discount;
        $finalPrice = round($finalPrice, 2);
//        dd('I am here', $finalPrice, $price, $carPrice);

        $request->request->add(['price' => $totalPrice]);

        $request->request->add(['discount_amount' => $discount]);
        $request->request->add(['final_price' => $finalPrice]);
//        $user = null;
        if($request->newCustomer == 'on')
        {

            if(User::where('email', '=', $request->email)->exists())
            {
                $user = User::where('email', '=', $request->email)->first();
                $request->request->add(['user_id' => $user->id]);
            }
            else
            {
                $password = $this->randomPassword();

                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['phone'] = $request->phone_number;
                $data['password'] = $password;
                $data['password_confirmation'] = $password;
                $data['role'] = 3;

                try{
                    $user = app('App\Http\Controllers\Auth\RegisterController')->createByAdmin($data);
                    $request->request->add(['user_id' => $user->id]);
                }
                catch (Exception $exception)
                {

                }


            }
        }


        $booking = Booking::create($request->all());

        $data = array(
            'booking' => $booking,
        );

        Mail::to($booking->user->email)->send(new BookingSuccessful($data));

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('bookings')->with('message', 'Booking Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    public function paymentConfirmation($id)
    {
        $booking = Booking::find($id);
        return view('Backend.Booking.payment', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $cars = Car::all();
        $locations = Location::all();
        $airports = Airport::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'customer');
        })->get();


        return view('Backend.Booking.edit', compact('cars', 'locations', 'airports', 'users', 'booking'));
    }

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $car = Car::find($request->car_id);
        $siteSettings = SiteSettings::all();
        $meetValue = round($siteSettings[0]->value,2);


        $to = $request->selectTo;

        $fromString = $request->selectFrom;
        $maintain = mb_substr($fromString, 0, 3);
        $from = substr($fromString, 3);
        $price = 0;
        $returnPrice = 0;
        $meetPrice = 0;
        $carPrice = round($car->fair, 2);
        $totalPrice = 0;
        $request->request->add(['from_to' => $maintain]);
        if($maintain == 'loc')
        {
            $location = Location::find($from);
            $request->request->add(['location_id' => $from]);
            $request->request->add(['airport_id' => $to]);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $to)
                {
                    $price = round($airport->pivot->price,2);
                    $returnPrice = round($airport->pivot->return_price, 2);
                }
            }
        }
        else
        {
            $location = Location::find($to);
//            dd($location);
            $request->request->add(['airport_id' => $from]);
            $request->request->add(['location_id' => $to]);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $from)
                {
                    $price = round($airport->pivot->return_price, 2);
                    $returnPrice = round($airport->pivot->price,2);;
                }
            }
        }
        if($request->return == 1)
        {
            $carPrice = $carPrice*2;

        }
        else
        {
            $returnPrice = 0;
        }
        if($request->meet == 1)
        {
            $meetPrice = $meetValue;
        }

        $totalPrice = $meetPrice + $price + $carPrice + $returnPrice;
        $request->request->add(['price' => $totalPrice]);

//        $booking = Booking::create($request->all());

        $booking =Booking::find($id);
        $booking->update($request->all());

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');

        $data = array(
            'booking' => $booking,

        );

        Mail::to($booking->user->email)->send(new BookingUpdated($data));
        return redirect()->route('bookings')->with('message', 'Booking Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $booking)
    {
        $booking = Booking::find($booking);
        $booking->delete();

        $request->session()->flash('alert-class', 'alert-danger');

        return redirect()->route('bookings')->with('message', 'Booking Deleted');
    }

    public function driverAssign($id)
    {
        $booking = Booking::find($id);
        $drivers = Driver::all();
        return view('Backend.Booking.assign', compact('booking', 'drivers'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function driverAssignUpdate(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->driver_id = $request->post('driver_id');
        $booking->save();
        $driver = Driver::find($booking->driver_id);
        $user_id = $booking->user->id;
        $user = User::find($user_id);

        $data = array(
            'driver' => $driver,
            'booking' => $booking,
            'user' => $user
        );

        Mail::to($driver->email)->send(new DriverAssigned($data));
        Mail::to($user->email)->send(new BookingUpdated($data));
        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('bookings')->with('message', 'Driver Assigned');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function jobCompletion($id)
    {

        $booking = Booking::find($id);
//        dd($booking->final_price);
        if($booking->driver_id == Null)
        {
            return Redirect::back()->withErrors(['Can Not complete a Job without assigning a Driver']);
        }
        if($booking->userTransaction == Null)
        {
            return Redirect::back()->withErrors(['Can Not complete a Job without Defining Payment']);
        }
        $booking->complete_status = 1;
        $booking->save();

        $invoice = new Invoice();
        $invoice->booking_id = $booking->id;
        $invoice->booking_date = $booking->journey_date;
        $invoice->pick_up = $booking->pickup_address;
        $invoice->drop_off = $booking->dropoff_address;
        $invoice->driver_name = $booking->driver->name;
        $invoice->driver_phone = $booking->driver->phone_number;
        $invoice->customer_name = $booking->user->name;
        $invoice->customer_phone = $booking->user->phone;
        $invoice->customer_email = $booking->user->email;
        if($booking->userTransaction->payment_id == 'Cash')
        {
            $invoice->payment_type = 'Cash';
        }
        else
        {
            $invoice->payment_type = 'Paypal';
        }

        $invoice->status = 0;
        if($booking->final_price != null)
            $invoice->total_amount = $booking->final_price;
        else
            $invoice->total_amount = $booking->price;


        if($booking->from_to == 'loc')
        {
            $invoice->booking_from = $booking->location->display_name;
            $invoice->booking_to = $booking->airport->display_name;
        }
        else
        {
            $invoice->booking_to = $booking->location->display_name;
            $invoice->booking_from = $booking->airport->display_name;

        }
        $invoice->save();

        return Redirect::back();

    }
}

