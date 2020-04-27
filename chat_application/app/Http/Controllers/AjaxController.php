<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Chat;
class AjaxController extends Controller
{
    //
    public function ajaxRequest()
    {
         if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){        
                //  $user = User::find($user_id);
                  return view('userchat');
              }
            if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
                return view('adminchat');
            }

        
    }
    public function ajaxRequestPost(Request $request)
    {

   //   $sender =  $request->input('sen');
      $receiver =   $request->input('rec');
     $chat_s=[];
     //   $chat_msg = DB::select("SELECT * FROM tbl_chat where receiverId=".$receiver." Or receiverId=".$request->session()->get('user_id'));
     //   if(count($chat_msg)>0){
          
       //$chat_s = DB::select("SELECT * FROM tbl_chat where senderId=".$request->session()->get('user_id')." AND receiverId=". $receiver);
            $chat_s = DB::select("SELECT * FROM tbl_chat where (senderId=".$request->session()->get('user_id')." AND receiverId=". $receiver.") OR (senderId=". $receiver." AND receiverId=".$request->session()->get('user_id').")");
        //   }
     //   else{
            
     //   }
     
        $cns = 0;
      // $chat_s = DB::select("SELECT * FROM tbl_chat where receiverId=".$receiver);
      $user = User::find($receiver);  
       $cns = count($chat_s);
      // $cnr = count($chat_r);
         if($cns >= 1){
          //return response()->json(['cnr'=>$cnr,'cns'=>$cns,'rid'=>$receiver,'smsg'=> $chat_s,'rmsg'=>$chat_r,'success'=>'Success Message Request.']);
          return response()->json(['cns'=>$cns,'name'=>$user->name,'rid'=>$receiver,'smsg'=> $chat_s,'success'=>'Success Message Request.']);
         }
         else{
             $chat_s=[];
          return response()->json(['cns'=>$cns,'rid'=>$receiver,'smsg'=> '','success'=>'Success Message Request.']);
        }
         
       
    }
    public function ajaxRequestsPost(Request $request){
     
        $this->validate($request,[            
            'cimage' =>'image|nullable|max:1999'
           ]);
   
           if($request->hasFile('cimage')){
   
               $filenameWithExt = $request->file('cimage')->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('cimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;
               $path = $request->file('cimage')->storeAs('public/cover_images',$fileNameToStore);
           }
           else {
               $fileNameToStore = 'noimage.jpg';
           }
           $chat = new Chat;
           $chat->senderId = $request->input('chat_sen_id');
           $chat->receiverId = $request->input('chat_rec_id');
           $chat->message = $request->input('message');
           
           $chat->chatImage = $fileNameToStore;           
           $chat->createdDate = date('Y-m-d');
           $chat->modifiedDate = now();
                    
           $chat->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
           if($user_id > 0 && $isAdmin ==1 ){
              
             //  return redirect('/chat/index');
               return response()->json(['success'=>'Success Message Added success Request.']);
           }
          /* else{
               return redirect('/chat/index');
           }*/

           

    }
    public function ajaxReqgetUsers(Request $request){
    //    $group_users = DB::select('SELECT tbl_group_user.uId,users.name FROM tbl_group_user')->join('users', 'users.id', '=', 'tbl_group_user.uId')->where('gId='.$request->input('gid')); 
    $group_users = DB::table('tbl_group_user')->join('users', 'users.id', '=', 'tbl_group_user.uId')->select('tbl_group_user.uId','users.name')->where('tbl_group_user.gId',$request->input('gid'))->get();   
         return response()->json(['resp'=>$group_users]);
    }
}
