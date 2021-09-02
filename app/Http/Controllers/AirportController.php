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
        auth()->user()->airport()->create($inputs);

        $user = auth()->user();
        session()->flash('airport-created-message', 'new airport added!');
        $airports = $user->airport()->simplePaginate(5);
        return view('pages.dashboard.airports.index', ['airports' => $airports]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        return view('pages.dashboard.airports.show', ['airport' => $airport]);
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
        session()->flash('airport-deleted-message', 'my airport deleted');
        return back();
    }
}
