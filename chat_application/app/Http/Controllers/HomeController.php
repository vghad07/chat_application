<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        if($user_id > 0 && $isAdmin ==1 ){
            $user = User::find($user_id);
            return view('adminhome')->with('posts',$user->posts);
        } 
        else{
            $user = User::find($user_id);
            return view('home')->with('posts',$user->posts);
        }       
 
    }

    /*public function ulist()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user_list');
    }*/
   
}
