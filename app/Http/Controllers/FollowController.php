<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class FollowController extends Controller
{
    public function index() 
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('users.index', compact('users'));
    }   

    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $posts = Post::where('user_id', $user->id)->get();
        if( $id == Auth::user()->id) {
            $user = Auth::user();
            $posts = Post::where('user_id', $user->id)->get();
            return view('profile.index', compact('user', 'posts'));
        }
        return view('profile.friend', compact('user', 'posts'));
    }


    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request){


        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);


        return response()->json(['success'=>$response]);
    }

}
