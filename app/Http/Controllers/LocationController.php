<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LocationController extends Controller
{
    public function update(Request $request) {
        /* DB::table('location')->insert([
            'user_id' => Auth::user()->id,
            'latitude' => $request->lat,
            'longitude' => $request->long,
        ]); */
        echo "lat = ".$request->input("lat")." && long = ".$request->input("long");
    }
}
