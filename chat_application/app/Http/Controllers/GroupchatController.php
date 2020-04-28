<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\Group;
use App\Group_chat;
use App\Group_users;
use DB;
class GroupchatController extends Controller
{
    public function groupchatRequest()
    {
         if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){        
                //  $user = User::find($user_id);
                  return view('usergroupchat');
              }
            if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
                return view('admingroupchat');
            }

        
    }
    public function groupchatinsert (){

    }
    public function groupchatRequestPost(Request $request)
    {

   //   $sender =  $request->input('sen');
      $receiver =   $request->input('rec');
      $chat_s=[];
     //   $chat_msg = DB::select("SELECT * FROM tbl_chat where receiverId=".$receiver." Or receiverId=".$request->session()->get('user_id'));
     //   if(count($chat_msg)>0){
          
       //$chat_s = DB::select("SELECT * FROM tbl_chat where senderId=".$request->session()->get('user_id')." AND receiverId=". $receiver);
            $chat_s = DB::select("SELECT * FROM tbl_group_chat where uId in(select uId from tbl_group_user where gId=". $receiver.") And uId=".$request->session()->get('user_id')." AND gId=". $receiver);
                      
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
          return response()->json(['cns'=>$cns,'gid'=>$receiver,'gmsg'=> $chat_s,'success'=>'Success Message Request.']);
         }
         else{
             $chat_s=[];
          return response()->json(['cns'=>$cns,'gid'=>$receiver,'gmsg'=> '','success'=>'Success Message Request.']);
        }
         
       
    }
    public function groupchatRequestsinsertPost(Request $request){
     
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
           
           $gus = DB::select("select uId from tbl_group_user where gId=".$request->input('chat_rec_id')); 
            if(count($gus)>0){
               foreach($gus as $u){
                   $gc = new Group_chat;
                   $gc->gId = $request->input('chat_rec_id');
                   $gc->uId = $u->uId;
                   $gc->chatMessage = $request->input('message');
                   $gc->chatImage = $fileNameToStore;           
                   $gc->createdDate = date('Y-m-d');
                   $gc->modifiedDate = now();
                   $gc->save();
           }
        }
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

}
