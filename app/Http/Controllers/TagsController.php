<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tags;
use App\Posts;

class TagsController extends Controller
{
    public function index() 
    {   
        $user = Auth::user();
        $tags = Tags::all();
        return view('tags.index', compact('user', 'tags'));
    }

    public function show($name)
    {
        $tag = Tags::where('name', $name)->first();
        return view('tags.show', compact('tag'));
    }


    public function create(Request $request, $sep='-')
    {
        $this->validate($request,[
            'tags' => 'required|min:3',
        ]);

        $res = strtolower($request->get('tags'));
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $titleT = trim($res, $sep);

        $tags = new Tags;
        $tags->name = $titleT;
        $tags->user_id = $request->get('user');
        $tags->save();

        return back();

    }
}
