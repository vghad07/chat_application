<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\User;
use App\Group;
use App\Group_users;
use App\Template_group_user;
use DB;
class TemplateController extends Controller
{
    //
    public function index(){
        $templates = DB::table('tbl_templates')->paginate(5);
       
        return view('template.template_list')->with('templates',$templates);
    }

    public function create(){

        return view('editor');
    }

    public function insert(Request $request){

        
        $this->validate($request,[
            'tname'=> 'required',
            'tdescription'  => 'required',
            'timage' =>'image|nullable|max:1999'
           ]);
   
           
          Template::insert($request);
           
           
           $isAdmin = auth()->user()->isAdmin;
           if(auth()->user()->id > 0 && $isAdmin ==1 ){
              
               return redirect()->back();
           }
           
    }

    public function assign(){
        $users = DB::select('SELECT * FROM users');
         $groups = DB::select('SELECT * FROM tbl_groups');
         $templates = DB::select('SELECT * FROM tbl_templates');
        return view('template.assign_template')->with('users',$users)->with('groups',$groups)->with('templates',$templates);
    }
    public function addUserGroupTemplate(Request $request){

        
         $date = str_replace('/', '-', $request->input('displayDate'));
        $ddate = date('Y-m-d', strtotime($date));
           
        $users = DB::select('SELECT * FROM users');
         $groups = DB::select('SELECT * FROM tbl_groups');
          $templates = DB::select('SELECT * FROM tbl_templates');
        if($request->session()->get('is_admin')==1 && $request->session()->get('is_active')==1){
        
           
                    
          $uids = $request->uid;
          $gid = $request->input('gid');
          $tid = $request->input('tid');
          $gus = new Group_users; 
          foreach($uids as $uid){
             if($gus->isUserExists($uid, $gid)){
                 break;
             }
             else{
                $tgus = new Template_group_user; 
                $tgus->tId = $request->input('tid');
                $tgus->gId = $request->input('gid');
                $tgus->uId = $uid;  
                            
                $tgus->createdDate = date('Y-m-d');
                $tgus->modifiedDate = now();
                $tgus->isDelete = 0;
                $tgus->isActive = 0; 
                $tgus->displayDate = $ddate;           
                $tgus->save();
             } 
         }
        
         return view('template.assign_template')->with('users',$users)->with('groups',$groups)->with('templates',$templates);
        }
    }

    
}
