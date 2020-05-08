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

public function index(){
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        $uid = session()->get('user_id');
      // $users = DB::select("SELECT users.*,tbl_chat.senderId,tbl_chat.unread,tbl_chat.receiverId,tbl_chat.message FROM users left join tbl_chat on users.id = tbl_chat.senderId  where users.isActive = 1 And users.id != ".$uid);
        $users = DB::select('SELECT * FROM users where id <> '.$user_id.' And isActive = 1');
        
        $chats = [];
				   
        if($user_id > 0 && $isAdmin ==1 ){
            return view('admingroupchat');
        } 
        else{	 
            return view('usergroupchat');
			
        }     
           
    }

    public function display(Request $request){
       $grps = [];$grp = [];
       $chats = [];$groupUid = [];
        $receiver = $request->gid;
       $request->session()->put('sgid',$request->gid);
        $groups = [];
       
            // $groups = DB::select('SELECT gId FROM tbl_group_user where uId='. $user_id);
             $grp =  DB::table('tbl_group_user')->where('uId',auth()->user()->id)->get(); 
            
             if(count($grp)>0){
                for($i =0;$i<count($grp);$i++){
                    $data[$i] = $grp[$i]->gId;
                }
              
              // $grps = DB::select('SELECT * FROM tbl_groups where gId in('.$gids.')')->toSql();
                  $grps =  DB::table('tbl_groups')->whereIn('gId',$data)->get();  
                 // return  $grps."--".auth()->user()->isAdmin;
                         
                    
                
            }
             $groups = DB::select('SELECT * FROM tbl_groups');
        
              
              // $grps = DB::select('SELECT * FROM tbl_groups where gId in('.$gids.')')->toSql();
                  $grps =  DB::table('tbl_groups')->whereIn('gId',$data)->get();  
                 // return  $grps."--".auth()->user()->isAdmin;
                         
                    
                
            
            // $chats = DB::select("SELECT * FROM tbl_group_chat where  gId=". $request->gid." Order By modifiedDate desc");
          $chats = DB::select('select tgc.*,tgu.uId,u.id,u.name,u.uImage from tbl_group_user tgu inner join users u on (tgu.uId=u.id) inner join tbl_group_chat tgc on(tgc.uId=tgu.uId)  where tgc.gId='. $receiver.' Group by tgc.gcId order by modifiedDate desc'); 
        
           
           $cns = count($grps); 
       
         $sender= auth()->user()->id;    
        
      
        
        
        if(count($grps)>0){  
             if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){ 
         return view('usergroupchat')->with(['grps'=>$grps,'chats'=>$chats]);
             }
         
            //return redirect()->back()->with(['chats'=>$chats]);
         }
          else{
              
            if($request->session()->get('is_active')== 1  && $request->session()->get('is_admin')==0){ 
          return view('usergroupchat')->with(['grps'=>$grps,'chats'=>$chats]);
             }
            }
            if(count($groups)>0){ 
          if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
             return view('admingroupchat')->with(['groups'=>$groups,'chats'=>$chats]);
          }else{
        
             if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
            return view('admingroupchat')->with(['groups'=>$groups,'chats'=>$chats]);
              } 
            }
          }
    }

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
           $gc->uId = auth()->user()->id;
           $gc->gId = $request->input('sgid');            
          
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
