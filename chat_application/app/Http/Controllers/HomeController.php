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
        //$this->middleware(['auth', 'verified']);
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
<<<<<<< HEAD
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
=======
        $isActive = auth()->user()->isActive;
        $name = auth()->user()->name;
    
        $request->session()->put(['user_id'=>$user_id,'is_admin'=>$isAdmin,'is_active'=>$isActive,'name'=>$name]);
        
       
       
               
            //$user = User::find($user_id);
            if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){        
                //  $user = User::find($user_id);
                  return view('home');
              }
            if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
                return view('adminhome');
            }
                  
            else{
                $request->session()->forget(['user_id','is_admin','is_active','name']);
                $request->session()->flush();
                return redirect('/');
            }
           
      
>>>>>>> a8a34027f8833ecf5df0369979de27e75322dd38
         
 
    }

    /*public function ulist()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user_list');
    }*/
   
}
