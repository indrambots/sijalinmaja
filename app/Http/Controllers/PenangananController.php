<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenangananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.penanganan.index');
    }

    public function datatable()
    {
        
    }
}
