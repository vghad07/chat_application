<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class VerifyMailController extends Controller
{
    //
    public function activateEmail($code){
        $id = 0;
       $users =   DB::select("SELECT id FROM users WHERE activation_code='$code'");
        foreach($users as $u){
           $id = $u->id;
        }
         if($users>0)
         {
           $st=0;
          // $result =mysqli_query($con,"SELECT id FROM userregistration WHERE activationcode='$code' and status='$st'");
           $result = DB::select("SELECT * FROM users WHERE activation_code='$code' And isActive='$st'");
           
          if(count($result)>0)
            {
               $st=1;           
                          
           $affected =  DB::statement("UPDATE users set isActive=1, email_verified_at=now() where id=".$id." limit 1");
             
             if($affected){
                 $msg="Your account is activated";
             } else{
                $msg="Your account is not activated";
             }
             
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
