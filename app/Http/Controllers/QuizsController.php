<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizsController extends Controller
{
    public function index() 
    {
        return view('community.index');
    }
}
