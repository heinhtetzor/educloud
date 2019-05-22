<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Sub_Course;
use App\Tags;
use Auth;
use App\User;

class CoursesController extends Controller
{
    public function index() 
    {   
        $user = Auth::user();
        $courses = Course::where('user_id', $user->id)->get();
        $tags = Tags::All();
        $blogs = Course::with('user')->get();
        return view('courses.index', compact('courses', 'user', 'blogs', 'tags'));
    }

    public function show($title) 
    {   
        
        $course = Course::with('user')->where('title', $title)->first();
        $sub_courses = Sub_Course::where('course_id', $course->id)->get();
        return view('courses.show', compact('course', 'sub_courses'));
    }

    public function create(Request $request, $sep='-')
    {   
        $this->validate($request, [
            'title' => 'required',
        ]);

        $res = strtolower($request->get('title'));
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $title = trim($res, $sep);
       

        $course = new Course;
        $course->title = $title;
        $course->tags = $request->tags;
        $course->user_id = Auth::user()->id;
        $course->save();

        return back();
        
    }

    public function sub_index($title, User $user) 
    {   
        
        $course = Course::where('title', $title)->first();
        return view('courses.create', compact('course'));

        
    }

    public function sub_create(Request $request, $sep='-') 
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $res = strtolower($request->get('title'));
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $title = trim($res, $sep);
       

        $course = new Sub_Course;
        $course->title = $title;
        $course->body = $request->body;
        $course->course_id = $request->course_id;
        $course->save();

        return back();
    }

    public function sub_show($name) 
    {   

        $blogs = Sub_Course::where('title', $name)->get();
        return view('courses.view', compact('blogs'));
    }
}
