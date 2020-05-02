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
protected function activateEmail($code){
        
       $users =   DB::select("SELECT * FROM users WHERE activation_code='$code'");
        
         if($users>0)
         {
           $st=0;
          // $result =mysqli_query($con,"SELECT id FROM userregistration WHERE activationcode='$code' and status='$st'");
           $result = DB::select("SELECT * FROM users WHERE activation_code='$code' And isActive='$st'");
           
          if(count($result)>0)
            {
               $st=1;
             
              $result1 = DB::select("SELECT * FROM users  SET isActive='$st',email_verified_at=now() WHERE activation_code='$code'");
              $msg="Your account is activated";
           }
            else{
           $msg ="Your account is already active, no need to activate again";
              }
        }
        else{
         $msg ="Wrong activation code.";
       }

       return view('auth.login')->with('msg',$msg);
}
    
  
}

   
