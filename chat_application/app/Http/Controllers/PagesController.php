<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware(['auth', 'verified']);
    }
    public function index() {    
          return view('auth.login');
    }

    
  
}

   
