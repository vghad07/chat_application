<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $users = DB::select('SELECT * FROM users');
        
        if($user_id > 0 && $isAdmin ==1 ){
            $user = User::find($user_id);
            $users = DB::table('users')
            ->leftJoin('tbl_chat', 'users.id', '=', 'tbl_chat.senderId')
            ->get();
            return view('adminchat')->with('users',$users);
        } 
        else{
            $user = User::find($user_id);
            return view('userchat')->with('users',$users);;
        }     
           
    }

    public function group(){
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        if($user_id > 0 && $isAdmin ==1 ){
            $user = User::find($user_id);
            return view('admingroupchat');
        } 
        else{
            $user = User::find($user_id);
            return view('usergroupchat');
        }     
           
    }
    public function insert(){
     
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
           $chat->message = $request->input('message');
           $chat->senderId = $request->input('senderid');
           $chat->receiverId = $request->input('receiverid');
           $chat->gImage = $fileNameToStore;           
           $chat->createdDate = date('Y-m-d');
           $chat->modifiedDate = now();
                    
           $chat->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
           if($user_id > 0 && $isAdmin ==1 ){
              
               return redirect('/chat/index');
           }
           else{
               return redirect('/chat/index');
           }

    }

}
