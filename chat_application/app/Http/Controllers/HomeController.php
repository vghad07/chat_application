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
       
        $url = auth()->user()->uImage;
   
        $request->session()->put(['user_id'=>auth()->user()->id,'is_admin'=> auth()->user()->isAdmin,'is_active'=>auth()->user()->isActive,'name'=>auth()->user()->name,'pic'=>$url]);
    
               
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
           
      
         
 
    }

    /*public function ulist()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user_list');
    }*/
   
}
