<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Post;
use App\User;

class ProfilesController extends Controller
{
    public function index() 
    {   
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('profile.index', compact('user', 'posts'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('avatar')) 
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('storage/profile/'  . $filename ) );

            $user = Auth::user();
            $user->photo = $filename;
            $user->save();

            return back();
        }
    }

    
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
}
