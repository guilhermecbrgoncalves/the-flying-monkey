<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
       'user_id', 'name', 'code', 'city', 'country', 'latitude', 'longitude'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
