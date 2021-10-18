<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $airports = $user->airport()->simplePaginate(10);
        return view('pages.dashboard.airports.index', ['airports' => $airports]);
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
        $inputs = $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if (Airport::where('name', $request->name)->count() > 0) {
            session()->flash('airport-duplicate-message', 'The Airport is already on the list!');
            return back();
        };

        try {
            if ($this->validate && $this->validate->fails()) {
                return back()->withErrors($this->validate);
            }
        } catch (\Exception $e) {

        }
        auth()->user()->airport()->create($inputs);
        session()->flash('airport-created-message', 'New airport added!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        $windyKey = 'XLhc3zJ9zFUyFWTwUKnh990aIW5LWz4Y';
        return view('pages.dashboard.airports.show', ['airport' => $airport, 'windyKey' => $windyKey]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        $airport->delete();
        session()->flash('airport-deleted-message', 'Airport deleted successfully');
        return back();
    }
}
