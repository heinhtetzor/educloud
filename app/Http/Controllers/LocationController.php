<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class LocationController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user()->id;
        if(count(DB::table('location')->where('user_id', $user)->get()) == 0) {
            DB::table('location')->insert([
                'user_id' => $user,
                'latitude' => $request->input("lat"),
                'longitude' => $request->input("long"),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        } else {

            // location is update in every 24 Hours

            $lastRecord = DB::table('location')->where('user_id', $user)->first();
            if((time() - strtotime($lastRecord->updated_at)) > 129600){
                DB::table('location')->where('user_id', $user)->update([
                    'latitude' => $request->input("lat"),
                    'longitude' => $request->input("long"),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                
            }
            
        }
    }
}
