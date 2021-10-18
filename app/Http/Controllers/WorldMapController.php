<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorldMapController extends Controller
{
    public function index() {
        return view('pages.dashboard.world-map.index');
    }
}
