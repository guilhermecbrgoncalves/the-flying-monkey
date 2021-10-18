<?php

namespace App\Http\Controllers;

use App\Logbook;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        //$user = User::find(2);
        $logbooks = $user->logbook()->orderBy('date', 'DESC')->simplePaginate(10);
        //$logbooks = Logbook::where($user)->simplePaginate(10);
        //$logbooks = Logbook::orderBy('date', 'DESC')->simplePaginate(10);
        return view('pages.dashboard.logbook.index', ['logbooks' => $logbooks]);
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
            'date' => 'required',
            'aircraft' => 'required|max:50',
            'departure_time' => 'required',
            'departure_place' => 'required|max:5',
            'arrival_time' => 'required',
            'arrival_place' => 'required|max:5',
            'take_offs' => 'required',
            'landings' => 'required',
            'type_of_flight' => 'required',
            'notes' => ''
        ]);

        try {
            if ($this->validate && $this->validate->fails()) {
                return back()->withErrors($this->validate);
            } 
        } catch (\Exception $e) {

        }

        $startTime = $request->departure_time;
        $finishTime   = $request->arrival_time;

        $start  = new Carbon($startTime);
        $end    = new Carbon($finishTime);

        $totalFlightTime = $start->diff($end)->format('%H:%I:%S');

        $logbook = new Logbook();
        $logbook->user_id = auth()->user()->id;
        $logbook->date = $request->date;
        $logbook->aircraft = $request->aircraft;
        $logbook->departure_place = $request->departure_place;
        $logbook->departure_time = $request->departure_time;
        $logbook->arrival_place = $request->arrival_place;
        $logbook->arrival_time =  $request->arrival_time;
        $logbook->total_flight_time = $totalFlightTime;
        $logbook->take_offs = $request->take_offs;
        $logbook->landings = $request->landings;
        $logbook->type_of_flight = $request->type_of_flight;
        $logbook->notes = $request->notes;

        $logbook->save();

        session()->flash('logbook-created-message', 'new Logbook entry created!');
    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function show(Logbook $logbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Logbook $logbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logbook $logbook)
    {
        $inputs = $this->validate($request, [
            'date' => 'required',
            'aircraft' => 'required|max:50',
            'departure_time' => 'required',
            'departure_place' => 'required|max:5',
            'arrival_time' => 'required',
            'arrival_place' => 'required|max:5',
            'take_offs' => 'required',
            'landings' => 'required',
            'type_of_flight' => 'required',
            'notes' => ''
        ]);

        try {
            if ($this->validate && $this->validate->fails()) {
                return back()->withErrors($this->validate);
            } 
        } catch (\Exception $e) {

        }

        $start  = new Carbon($request->departure_time);
        $end    = new Carbon($request->arrival_time);

        $logbook->update($request->all());
        $logbook->total_flight_time =  $request->total_flight_time = $start->diff($end)->format('%H:%I:%S');
        $logbook->update();

        session()->flash('logbook-updated-message', 'logbook entry edited successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logbook $logbook)
    {
        $logbook->delete();
        session()->flash('logbook-deleted-message', 'logbook entry deleted');
        return redirect()->route('my-logbook');
    }
}
