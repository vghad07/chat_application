<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
class UsersController extends Controller
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
        $users = DB::select('SELECT * FROM users');
        return view('user_list')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create(){
         return view('createuser');
     }

     public function store(Request $request){
         $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');          
        $user->password =  Hash::make($request->input('password'));
        $user->save();
        return redirect('/users/user_list')->with('success','User Added');
     }
    public function activate($id)
    {
        //
        $affected = DB::table('users')
              ->where('id', $id)
              ->update(['isActive' => 1]);
             
              return redirect('/users/user_list')->with('success','User Activated Successfully');;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        //
        $affected = DB::table('users')
              ->where('id', $id)
              ->update(['isActive' => 0]);     
              return redirect('/users/user_list')->with('success','User Deactivated Successfully');;
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
       
        $user = User::find($id);       
        return view('edituser')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        //
           $user = User::find($id);
           $user->name = $request->input('name');
           $user->email = $request->input('email');          
           $user->password =  Hash::make($request->input('password'));
           $user->save();
   
           return redirect('/users/user_list')->with('success','User Updated Successfully');;
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
        $user = User::find($id);
                
        $user->delete();   
   
        return redirect('/users/user_list')->with('success','User Deleted Successfully');
    }
    public function ulist()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $users = DB::select('SELECT * FROM users');
        return view('user_list')->with('users',$users);
    }
}
