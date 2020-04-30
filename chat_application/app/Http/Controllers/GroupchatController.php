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
      $sen =   $request->input('sen');
      
      $chat_s=[];
      $cus=[];
     //   $chat_msg = DB::select("SELECT * FROM tbl_chat where receiverId=".$receiver." Or receiverId=".$request->session()->get('user_id'));
     //   if(count($chat_msg)>0){
          
       //$chat_s = DB::select("SELECT * FROM tbl_chat where senderId=".$request->session()->get('user_id')." AND receiverId=". $receiver);
            //$chat_s = DB::select("SELECT * FROM tbl_group_chat where uId in(select uId from tbl_group_user where gId=". $receiver.") And uId=".$request->session()->get('user_id')." AND gId=". $receiver." Order By modifiedDate desc");
            $groupUsers = DB::select('select uId from tbl_group_user where gId='. $receiver); 
                   
            //   }
     //   else{
            
     //   }
  
          $chat_s = DB::select("SELECT tgc.*,u.* FROM tbl_group_chat as tgc left join tbl_group_user as tgu on tgc.gId=tgu.gId join users as u on tgu.uId=u.id where tgc.gId=".$receiver." AND u.id=".$sen);
           $chat_users = DB::select("select users.name,users.uImage from users where users.id in (SELECT tgc.uId FROM tbl_group_chat as tgc left join tbl_group_user as tgu on tgc.gId=tgu.gId join users as u on tgu.uId=u.id where tgc.gId=".$receiver." AND u.id=".$sen.")");
        //   $chat_users = DB::select("SELECT * FROM users where id in($chat_s)"); 
  
     
        $cns = 0;
      // $chat_s = DB::select("SELECT * FROM tbl_chat where receiverId=".$receiver);
    //  $user = User::find($sen);  
       $cns = count($chat_s);
      // $cnr = count($chat_r);
         if($cns > 0 ){
            
          //return response()->json(['cnr'=>$cnr,'cns'=>$cns,'rid'=>$receiver,'smsg'=> $chat_s,'rmsg'=>$chat_r,'success'=>'Success Message Request.']);
          return response()->json(['cns'=>$cns,'users'=>$chat_users,'gid'=>$receiver,'gmsg'=> $chat_s,'success'=>'Success Message Request.']);
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
           $fileNameToStore = null;
           if($request->hasFile('cimage')){
   
               $filenameWithExt = $request->file('cimage')->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('cimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;
              
                $path = $request->file('cimage')->move(public_path('images/chat/'),$fileNameToStore);
           }      
          
           $gc = new Group_chat;
           $gc->uId = $request->input('chat_sen_id');
           $gc->gId = $request->input('gid');                   
           $gc->chatMessage = $request->input('message');
                if(!empty($fileNameToStore)){
                  $gc->chatImage = $fileNameToStore;
                }
            $gc->createdDate = date('Y-m-d');
            $gc->modifiedDate = now();
            $gc->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
           $isActive = auth()->user()->isActive;
           if($user_id > 0 && $isActive ==1 ){
              
             //  return redirect('/chat/index');
               return response()->json(['success'=>'Success Message Added success Request.']);
           }
          /* else{
               return redirect('/chat/index');
           }*/

           

    }

}
