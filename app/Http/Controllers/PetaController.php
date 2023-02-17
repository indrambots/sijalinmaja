<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.peta.index');
    }
}
