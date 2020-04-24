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
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        $name = auth()->user()->name;

        $request->session()->put(['user_id'=>$user_id,'is_admin'=>$isAdmin,'name'=>$name]);
        
        if($request->session()->has('user_id') && $request->session()->has('is_admin')){
            //$user = User::find($user_id);
            if($request->session()->has('user_id') > 0 && $request->session()->has('is_admin')==1){
                return view('adminhome');
            }
            if($request->session()->has('user_id') > 0 && $request->session()->has('is_admin')==0){        
              //  $user = User::find($user_id);
                return view('home');
            }      
            else{
                view('login');
            }
           
        } 
         
 
    }

    /*public function ulist()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user_list');
    }*/
   
}
