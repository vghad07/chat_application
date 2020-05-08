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
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware(['auth', 'verified']);
    }
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
        
           
            $uids= [];        
          $uids = $request->uid;
          $gid = $request->input('gid');
          $tid = $request->input('tid');
          $gus = new Group_users;
          
          if(count($uids) >0){        
             foreach($uids as $uid)
                $tgus = new Template_group_user; 
                $tgus->tId = $request->input('tid');
                $tgus->uId = $uid;  
                $tgus->gId  = null;          
                $tgus->createdDate = date('Y-m-d');
                $tgus->modifiedDate = now();
                $tgus->isDelete = 0;
                $tgus->isActive = 1; 
                $tgus->displayDate = $ddate;           
                $tgus->save();
              
         }
         if($request->input('gid')){
                $tg = new Template_group_user; 
                $tg->tId = $request->input('tid');
                $tg->uId = null;  
                $tg->gId  = $gid;          
                $tg->createdDate = date('Y-m-d');
                $tg->modifiedDate = now();
                $tg->isDelete = 0;
                $tg->isActive = 1; 
                $tg->displayDate = $ddate;           
                $tg->save();
         }
                
                 
        
         return view('template.assign_template')->with('users',$users)->with('groups',$groups)->with('templates',$templates);
        }
    }
     public function activate($id)
    {
        //
        $affected = DB::table('tbl_templates')
              ->where('tId', $id)
              ->update(['isActive' => 1]);
             
              return redirect()->back()->with('success','Template Activated Successfully');;
    }


    
    public function deactivate($id)
    {
        //
        $affected = DB::table('tbl_templates')
              ->where('tId', $id)
              ->update(['isActive' => 0]);     
              return redirect()->back()->with('success','Templated Deactivated Successfully');;
    }
public function destroy($id)
    {
        //
        $user = Template::find($id);
                
        $user->delete();   
   
        return redirect()->back()->with('success','Template Deleted Successfully');
    }
    public function temp(Request $request){   
       $affected = DB::table('tbl_temp_group_user')
              ->where(['tId'=>$request->tid,'uId'=>$request->tuid])
              ->update(['isActive' => 0]);
             
              return redirect()->back()->with('success',1);
}
}