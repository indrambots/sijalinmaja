<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    
    public function indexs()
    {
       return view('landing.index');
    }
}
