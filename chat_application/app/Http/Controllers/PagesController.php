<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    
    public function index() {
        $title = "Welcome to the index page of Laravel";
      //  return view('pages.index',compact('title'));
          return view('auth.login');
    }

   /* public function about() {
        $title = "Welcome to about us page of Laravel project";
        return view('pages.about')->with('title',$title);
    }

    public function service() {
        $data = array(
            'title'=>'Services page of Laravel project',
            'services'=>['Web designing','Programming','Testing']
        );
        return view('pages.services')->with($data);
    }*/
}

   
