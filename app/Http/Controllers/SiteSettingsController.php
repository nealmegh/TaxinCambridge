<?php

namespace App\Http\Controllers;

use App\Location;
use App\SiteSettings;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SiteSettings::all();
        return view('Backend.Settings.index', compact('settings'));
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
     * @param  \App\SiteSettings  $siteSettings
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSettings $siteSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteSettings  $siteSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSettings $siteSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteSettings  $siteSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $settings = SiteSettings::all();
        foreach ($settings as $setting)
        {

            if(array_key_exists($setting->attribute, $request->all()))
            {
                $setting->value = $request[$setting->attribute];
                $setting->save();
            }
        }
        return redirect()->route('settings');

    }

    /**
     * @param Request $request
     */
    public function fairRaise(Request $request)
    {
        $locations = Location::all();

        if($request->increase_type != 1)
        {
            foreach ($locations as $location)
            {
                foreach ($location->airports as $airport)
                {
                    $airport->pivot->price = $airport->pivot->price + ($airport->pivot->price*($request->fairRaise/100));
                    $airport->pivot->return_price = $airport->pivot->return_price + ($airport->pivot->return_price*($request->fairRaise/100));
                    $airport->pivot->update();

                }
            }
        }
        else{
            foreach ($locations as $location)
            {
                foreach ($location->airports as $airport)
                {
                    $airport->pivot->price = $airport->pivot->price + $request->fairRaise;
                    $airport->pivot->return_price = $airport->pivot->return_price + $request->fairRaise;
                    $airport->pivot->update();

                }
            }
        }


        return redirect()->route('settings');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteSettings  $siteSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSettings $siteSettings)
    {
        //
    }
}
