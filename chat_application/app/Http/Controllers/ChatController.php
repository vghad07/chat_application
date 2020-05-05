<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\Group;
use App\Group_users;
use DB;
class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        $uid = session()->get('user_id');
        $users = DB::select("SELECT users.*,tbl_chat.senderId,tbl_chat.unread,tbl_chat.receiverId,tbl_chat.message FROM users left join tbl_chat on users.id = tbl_chat.senderId  where users.isActive = 1 And users.id != ".$uid);
        
        
        if($user_id > 0 && $isAdmin ==1 ){
            return view('adminchat')->with('users',$users);
        } 
        else{
            return view('userchat')->with('users',$users);
        }     
           
    }

    public function sendmail(){
        return view('testmail');
    }

    public function group(Request $request){
        
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        $groups = DB::select('SELECT * FROM tbl_groups');
        if($user_id > 0 && $isAdmin ==1 ){
           
            return view('admingroupchat')->with('groups',$groups);
        } 
        else{
            $data = [];
            // $groups = DB::select('SELECT gId FROM tbl_group_user where uId='. $user_id);
             $groups =  DB::table('tbl_group_user')->where('uId',$user_id)->get(); 
            if(count($groups)>0){
                for($i =0;$i<count($groups);$i++){
                    $data[$i] = $groups[$i]->gId;
                }
              
              // $grps = DB::select('SELECT * FROM tbl_groups where gId in('.$gids.')')->toSql();
                  $grps =  DB::table('tbl_groups')->whereIn('gId',$data)->get();  
                                   
            
                return view('usergroupchat')->with('grps',$grps);
            }
            
        }     
           
    }
 /*   public function insert(Request $request){
     
        $this->validate($request,[            
            'cimage' =>'image|nullable|max:1999'
           ]);
          
           if($request->hasFile('cimage')){
   
               $filenameWithExt = $request->file('cimage')->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('cimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;
              // $path = $request->file('cimage')->storeAs('public/cover_images',$fileNameToStore);
                $path = $request->file('cimage')->move(public_path('images/chat/'),$fileNameToStore);
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
            
               return response()->json(['success'=>'Success Message Added success Request.']);
           }
         
    }*/

    public function groupInsert(Request $request){
     
        $this->validate($request,[            
            'cimage' =>'image|nullable|max:1999'
           ]);
         
           if($request->hasFile('cimage')){
   
               $filenameWithExt = $request->file('cimage')->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('cimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;               
               $path = $request->file('cimage')->move(public_path('images/groupchat/'),$fileNameToStore);
           }
           
           $chat = new Group_chat;
           $chat->uId = $request->input('chat_sen_id');
           $chat->gId = $request->input('gId');
           $chat->chatMessage = $request->input('message');
           
           $chat->chatImage = $fileNameToStore;           
           $chat->createdDate = date('Y-m-d');
           $chat->modifiedDate = now();
                    
           $chat->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
           if($user_id > 0 && $isAdmin ==1 ){
              
         
               return response()->json(['success'=>'Success Message Added success Request.']);
           }
          
    }
   

}
