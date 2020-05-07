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
                // 
                $users = DB::select("SELECT users.*,tbl_chat.senderId,tbl_chat.receiverId,tbl_chat.message FROM users left join tbl_chat on (users.id = tbl_chat.senderId)   where users.isActive = 1 And users.id != ".$request->session()->get('user_id')." Group by users.id");
                // $user = User::find($user_id);
                  return view('userchat')->with('users',$users);
              }
            if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
              $users = DB::select("SELECT users.*,tbl_chat.senderId,tbl_chat.receiverId,tbl_chat.message FROM users left join tbl_chat on (users.id = tbl_chat.senderId)   where users.isActive = 1 And users.id != ".$request->session()->get('user_id')." Group by users.id");
                return view('adminchat')->with('users',$users);
            }

        
    }
   
    public function ajaxRequestPost(Request $request)
    {

       //$sender =  $request->input('sen');
       $receiver =   $request->input('rec');
													   
       $chat_s=[];
      
       $chat_s = DB::select("SELECT * FROM tbl_chat where (senderId=".auth()->user()->id." AND receiverId=". $receiver.") OR (senderId=". $receiver." AND receiverId=".auth()->user()->id.") Order By modifiedDate desc");
			 $cns = 0;
    
       $user = User::find($receiver);  
       $cns = count($chat_s);
     
         if($cns >= 1){ 	   
																						   
															   
          return response()->json(['cns'=>$cns,'name'=>$user->name,'uimage'=>$user->uImage,'rid'=>$receiver,'smsg'=> $chat_s,'success'=>'Success Message Request.']);
         }
         else{
             $chat_s=[];
          return response()->json(['cns'=>$cns,'rid'=>$receiver,'smsg'=> '','success'=>'Success Message Request.']);
        }
         
       
    }
    public function ajaxRequestsPost(Request $request){

      
      $fileNameToStore = null;
     if($request->hasFile('cimage')){
   
               $filenameWithExt = $request->file('cimage')->getClientOriginalName();
               
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('cimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;              
               $path = $request->file('cimage')->move(public_path('images/chat/'),$fileNameToStore);
                
      }
      else{
         if(empty($request->input('message'))){
                  return response()->json(['res'=>0,'success'=>'Please Enter message']);
        }
      }
           $chat = new Chat;
           $chat->senderId = auth()->user()->id;                //$request->input('chat_sen_id');
           $chat->receiverId =   $request->chat_rec_id;                          //$request->input('chat_rec_id');           
           $chat->message = (empty($request->input('message'))) ? '': $request->input('message');
                 
           $chat->chatImage = $fileNameToStore;      
           $chat->createdDate = date('Y-m-d');
           $chat->modifiedDate = now();                    
           $chat->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
            
            if($user_id > 0 && $isAdmin ==1 ){           
               return redirect()->back();
           }
          
                
          
    }
    public function ajaxRequestcountMessage(Request $request){
        
      $nos = DB::select("SELECT count(unread) as cnt FROM tbl_chat where unread=0 and receiverId=".$request->input('rid')." and receiverId=".$request->input('sid')." and senderId!=".$request->session()->get('user_id'));
             
        
         foreach($nos as $n){
               $cnt = $n->cnt;
             }
                       
      return response()->json(['nos'=> $cnt,'success'=>'Count message']);
           
    }
    public function ajaxRequestsseenMessage(Request $request){
        
          
       $affected = DB::table('tbl_chat')
              ->where('receiverId',$request->input('sid'))
              ->where('senderId',$request->session()->get('user_id'))
              ->update(['unread' => 1]); 
                       
      return response()->json(['success'=>'Message seen']);
           
    }
    public function ajaxReqgetGUsers(Request $request){
    //    $group_users = DB::select('SELECT tbl_group_user.uId,users.name FROM tbl_group_user')->join('users', 'users.id', '=', 'tbl_group_user.uId')->where('gId='.$request->input('gid')); 
    $group_users = DB::table('tbl_group_user')->join('users', 'users.id', '=', 'tbl_group_user.uId')->select('tbl_group_user.uId','users.name')->where('tbl_group_user.gId',$request->input('gid'))->get();   
         return response()->json(['resp'=>$group_users]);
    }
     public function ajaxReqsgetTUsers(Request $request){
    //    $group_users = DB::select('SELECT tbl_group_user.uId,users.name FROM tbl_group_user')->join('users', 'users.id', '=', 'tbl_group_user.uId')->where('gId='.$request->input('gid')); 
    $temp_groups = DB::table('tbl_temp_group_user')->join('tbl_groups', 'tbl_groups.gId', '=', 'tbl_temp_group_user.gId')->select('tbl_temp_group_user.tId','tbl_groups.gName')->where('tbl_temp_group_user.tId',$request->input('tid'))->get();
    //$temp_users = DB::table('tbl_temp_group_user')->join('users', 'users.id', '=', 'tbl_temp_group_user.uId')->select('tbl_temp_group_user.uId','users.name')->where('tbl_temp_group_user.tId',$request->input('tid'))->get();   
    $temp_users = DB::table('tbl_temp_group_user')->join('users', 'users.id', '=', 'tbl_temp_group_user.uId')->select('users.id','users.name')->where('tbl_temp_group_user.tId',$request->input('tid'))->get();
    //$temp_users = DB::select("Select u.name from users u join tbl_temp_group_user ttgu on ttgu.uId=u.id"); 
    return response()->json(['temp_group'=>$temp_groups,'temp_user'=>$temp_users]);
    }
}
