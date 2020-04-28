<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use App\User;
use App\Group;
use App\Group_users;
use DB;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $groups = DB::table('tbl_groups')->paginate(5);
       
        return view('group_list')->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = auth()->user()->id;
        $isAdmin = auth()->user()->isAdmin;
        if($user_id > 0 && $isAdmin ==1 ){
            return view('creategroup');
        }
        else{
            return view('creategroupuser');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'gname'=> 'required',
            'gdescription'  => 'required',
            'gimage' =>'image|nullable|max:1999'
           ]);
   
           if($request->hasFile('gimage')){
   
               $filenameWithExt = $request->file('gimage')->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('gimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;
               $path = $request->file('gimage')->move(public_path('images'),$fileNameToStore);
           }
           else {
               $fileNameToStore = 'noimage.jpg';
           }
   
           $group = new Group;
           $group->gName = $request->input('gname');
           $group->gDescription = $request->input('gdescription');
           $group->gImage = $fileNameToStore;
           $group->createdBy = auth()->user()->id;
           $group->createdDate = date('Y-m-d');
           $group->modifiedDate = now();
           $group->isDelete = 0;
           $group->isActive = 1;           
           $group->save();
           $user_id = auth()->user()->id;
           $isAdmin = auth()->user()->isAdmin;
           if($user_id > 0 && $isAdmin ==1 ){
              
               return redirect('/group/group_list')->with('success','Group created');
           }
           else{
               return redirect('/home')->with('success','Group created');
           }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $groups = DB::select('SELECT * FROM tbl_groups');
       
        
        return view('group_list')->with('groups',$groups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group = Group::find($id);       
        return view('groupedit')->with('group',$group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'gname'=> 'required',
            'gdescription'  => 'required',
            'gimage' =>'image|nullable|max:1999'
           ]);
   
           if($request->hasFile('gimage')){
   
               $filenameWithExt = $request->file('gimage')->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $request->file('gimage')->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;
               $path = $request->file('gimage')->move(public_path('images'),$fileNameToStore);
           }
          
   
           $group = Group::find($id);
           $group->gName = $request->input('gname');
           $group->gDescription = $request->input('gdescription');
           if($request->hasFile('gimage')){
            $group->gImage = $fileNameToStore;
           }          
           $group->createdBy = auth()->user()->id;                     
           $group->save();
           return redirect('/group/group_list')->with('success','Group Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $group = Group::find($id);     

        if($group->cover_image !='noimage.jpg'){
           // Storage::delete('public/assets/cover_images/'.$group->gImage);
        }
        $group->delete();   
   
        return redirect('/group/group_list')->with('success','Group Deleted successfully');
    }
    public function userGroup(){
        $users = DB::select('SELECT * FROM users');
         $groups = DB::select('SELECT * FROM tbl_groups');
       
        return view('usergroup')->with('users',$users)->with('groups',$groups);
    }
    public function adduserGroup(Request $request){
        $users = DB::select('SELECT * FROM users');
         $groups = DB::select('SELECT * FROM tbl_groups');
        
         $gus = new Group_users;         
          $uids = $request->uid;
          $gid = $request->input('gid');
         
          foreach($uids as $uid){
             if($gus->isUserExists($uid, $gid)){
                 break;
             }
             else{  
            $group_users = new Group_users;

           $group_users->gId = $request->input('gid');
           $group_users->uId = $uid;               
           $group_users->createdDate = date('Y-m-d');
           $group_users->modifiedDate = now();
           $group_users->isDelete = 0;
           $group_users->isActive = 1;           
           $group_users->save();
             }
    }
        
       return view('usergroup')->with('users',$users)->with('groups',$groups);
    }
}
