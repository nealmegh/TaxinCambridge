<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('Backend.Driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:drivers'],
            'phone_number' => ['required'],
            'vehicle_reg' => ['required'],
            'commission' => ['required']
        ]);

        $driver = Driver::create($request->all());
        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('drivers')->with('message', 'Driver Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('Backend.Driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => 'required|unique:drivers,email,'.$id,
            'phone_number' => ['required'],
            'vehicle_reg' => ['required'],
            'commission' => ['required']
        ]);

        $driver = Driver::find($id);

        $driver->name = $request->post('name');
        $driver->email = $request->post('email');
        $driver->phone_number = $request->post('phone_number');
        $driver->vehicle_reg = $request->post('vehicle_reg');
        $driver->commission = $request->post('commission');

        $driver->save();
        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('drivers')->with('message', 'Driver Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $driver)
    {
        $driver = Driver::find($driver);
        $driver->delete();

        $request->session()->flash('alert-class', 'alert-danger');

        return redirect()->route('drivers')->with('message', 'Driver Type Deleted');

    }
}
