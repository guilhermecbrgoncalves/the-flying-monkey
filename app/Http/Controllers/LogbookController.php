<?php

namespace App\Http\Controllers;

use App\Logbook;
use App\User;
use Illuminate\Http\Request;

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
            'aircraft' => 'required',
            'departure_time' => 'required',
            'departure_place' => 'required',
            'arrival_time' => 'required',
            'arrival_place' => 'required',
            'take_offs' => 'required',
            'landings' => 'required',
            'total_flight_time' => 'required',
            'type_of_flight' => 'required',
            'notes' => 'required',
        ]);
        auth()->user()->logbook()->create($inputs);

        $user = auth()->user();
        session()->flash('logbook-created-message', 'new Logbook entry created!');
        $logbooks = $user->logbook()->orderBy('date', 'DESC')->simplePaginate(5);
        return view('pages.dashboard.logbook.index', ['logbooks' => $logbooks]);
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
        $logbook->update($request->all());
        session()->flash('logbook-updated-message', 'logbook entry edited successfully!');
        return redirect('my-logbook');
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
