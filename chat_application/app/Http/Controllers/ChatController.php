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
        $temp =[];$chats = [];
        $uid = session()->get('user_id');
      // $users = DB::select("SELECT users.*,tbl_chat.senderId,tbl_chat.unread,tbl_chat.receiverId,tbl_chat.message FROM users left join tbl_chat on users.id = tbl_chat.senderId  where users.isActive = 1 And users.id != ".$uid);
        $users = DB::select('SELECT * FROM users where id <> '.$user_id.' And isActive = 1');
         $temp = DB::select('SELECT * FROM tbl_templates tt join tbl_temp_group_user ttgu on tt.tId=ttgu.tId where ttgu.isActive=1 AND ttgu.uId='.auth()->user()->id.' limit 1');
        
				   
        if($user_id > 0 && $isAdmin ==1 ){
            return view('adminchat')->with('users',$users)->with('chats',$chats);
        } 
        else{	 
           return view('userchat')->with(['users'=>$users,'chats'=>$chats,'temp'=>$temp]);
			
        }     
           
    }

    public function display(Request $request){
        $chats = [];
        $usr = [];
        
       //  $chats = DB::select("SELECT * FROM tbl_chat where (senderId=".auth()->user()->id." AND receiverId=". $request->rid.") OR (senderId=". $request->rid." AND receiverId=".auth()->user()->id.") Order By modifiedDate desc");
           $users = DB::select('SELECT * FROM users where id <> '.auth()->user()->id.' And isActive = 1');  
        $usr = User::find($request->rid);
         $sender= auth()->user()->id;
         $receiver = $request->rid;
        $chats =  DB::table('tbl_chat')->where(function ($query) use ($sender,$receiver){
               $query->where([
       ['senderId','=',$sender],
       ['receiverId','=',$receiver]       
       ])->orWhere([
                  ['senderId','=',$receiver],
                  ['receiverId','=',$sender]
               ]);
           })->orderBy("modifiedDate","desc")->paginate(15);
      
        $request->session()->put('srec_id',$request->rid);
       
         // return view('inc.template_message')->with('temp',$temp);
        
         
        if(count($chats)>0){  
             if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){ 
         return view('userchat')->with(['users'=>$users,'chats'=>$chats,'usr'=>$usr]);
             }
          if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
         return view('adminchat')->with(['users'=>$users,'chats'=>$chats,'usr'=>$usr]);
          }
            //return redirect()->back()->with(['chats'=>$chats]);
         }
         else{
              
            if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){ 
          return view('userchat')->with(['users'=>$users,'chats'=>$chats,'usr'=>$usr]);
             }
             if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
            return view('adminchat')->with(['users'=>$users,'chats'=>$chats,'usr'=>$usr]);
              } 
            }
    }

public function insert(Request $request){
     
        $this->validate($request,[            
            'cimage' =>'image|nullable|max:1999'
           ]);
          $fileNameToStore=null;
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
                        
            
               return redirect()->back();
           
         
    }

    public function group(Request $request){

       
        $chats=[];
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        $groups = DB::select('SELECT * FROM tbl_groups');
        if($user_id > 0 && $isAdmin ==1 ){
           
            return view('admingroupchat')->with(['groups'=>$groups,'chats'=>$chats]);
        } 
        else{
            $data = [];
            $grps = [];
            $groups = [];
            // $groups = DB::select('SELECT gId FROM tbl_group_user where uId='. $user_id);
             $groups =  DB::table('tbl_group_user')->where('uId',$user_id)->get(); 
            
             if(count($groups)>0){
                for($i =0;$i<count($groups);$i++){
                    $data[$i] = $groups[$i]->gId;
                }
              
              // $grps = DB::select('SELECT * FROM tbl_groups where gId in('.$gids.')')->toSql();
                  $grps =  DB::table('tbl_groups')->whereIn('gId',$data)->get();  
                 // return  $grps."--".auth()->user()->isAdmin;
                         
                    
                 return view('usergroupchat')->with(['grps'=>$grps,'chats'=>$chats]);
            }
            
            
        }     
           
    }
 

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
