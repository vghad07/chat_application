<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Chat;
class AjaxController extends Controller
{
    //
    public function ajaxRequest()
    {
        return view('adminchat');
    }
    public function ajaxRequestPost(Request $request)
    {
      $sender =  $request->input('sen');
      $receiver =   $request->input('rec');
      $chat = DB::select("SELECT message FROM tbl_chat where senderId=".$sender." AND receiverId=".$receiver);
       if(count($chat)>0){
        return response()->json(['sid'=>$sender,'rid'=>$receiver,'msg'=> $chat,'success'=>'Got Simple Ajax Request.']);
       }
        //$msg= "hi";
        else{
          return response()->json(['sid'=>$sender,'rid'=>$receiver,'msg'=> "text",'success'=>'Got Simple Ajax Request.']);
        }
    }
}
