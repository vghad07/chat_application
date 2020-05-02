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
        $receiver =   $request->input('rec');
        $sen =   $request->input('sen');
        $groupUsers=[];
       
         $cns = 0;
        $groupUsers = DB::select('select tgc.*,tgu.uId,u.id,u.name,u.uImage from tbl_group_user tgu inner join users u on (tgu.uId=u.id) inner join tbl_group_chat tgc on(tgc.uId=tgu.uId)  where tgc.gId='. $receiver.' Group by tgc.gcId'); 
         $cns = count($groupUsers);
       
        if($cns > 0 ){
              return response()->json(['cns'=>$cns,'gid'=>$receiver,'gmsg'=> $groupUsers,'success'=>'Success Message Request.']);
        }
        else{
             
             $groupUsers=[];
          return response()->json(['cns'=>$cns,'gid'=>$receiver,'gmsg'=> '','success'=>'Success Message Request.']);
        }
         
       
    }
    public function groupchatRequestsinsertPost(Request $request){
     
        $fileNameToStore = null;
     if($request->hasFile('cimage')){
   
               $filenameWithExt = $request->file('cimage')->getClientOriginalName();
               
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('cimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;              
               $path = $request->file('cimage')->move(public_path('images/groupchat/'),$fileNameToStore);
                
      }
      else{
         if(empty($request->input('message'))){
                  return response()->json(['res'=>0,'success'=>'Please Enter message']);
        }
      }
          
           $gc = new Group_chat;
           $gc->uId = $request->input('chat_sen_id');
           $gc->gId = $request->input('gid');            
          
           $gc->chatMessage = (empty($request->input('message'))) ? '': $request->input('message');
           $gc->chatImage = $fileNameToStore;
                
            $gc->createdDate = date('Y-m-d');
            $gc->modifiedDate = now();
            $gc->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
           $isActive = auth()->user()->isActive;
           if($user_id > 0 && $isActive ==1 ){
              
             //  return redirect('/chat/index');
               return response()->json(['res'=>1,'success'=>'Success Message Added success Request.']);
           }
        
    }

}
