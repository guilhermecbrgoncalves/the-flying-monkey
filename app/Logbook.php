<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    protected $fillable = [
        'date',
        'aircraft',
        'departure_time',
        'departure_place',
        'arrival_time',
        'arrival_place',
        'total_flight_time',
        'take_offs',
        'landings',
        'type_of_flight',
        'notes'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
