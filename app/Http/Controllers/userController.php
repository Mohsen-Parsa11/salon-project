<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class userController extends Controller
{
    public function User(){
        $users= User::paginate(4);
        return view('admin.users.user', ['users'=>$users]);
    }

    public function addUser(){
        return view('admin.users.addUser');
    }

    public function save(Request $request){

        $request->validate([
            'user_name'=>'required|min:3|max:20|unique:users,name',
            'user_email'=>'required',
            'user_password'=>'required'
        ]);

        $users= new User();
        $users->name= $request->user_name;
        $users->last_name= $request->user_lname;
        $users->email= $request->user_email;
       $users->role= $request->user_role;
        $users->password= Hash::make($request->user_password);
        if($request->photo){
            $photo_address= $request->file('photo')->store('user');
            $users->photo= $photo_address;
        }
        if($users->save()){
            Session::flash('message','user inserted successfully');            
            Session::flash('alert','alert-success');            
        }else{
            Session::flash('message','insert faild');            
            Session::flash('alert','alert-danger');     
        }
        return redirect('admin/users/user');
    }

    public function editUser($user_id){
        $user= User::find($user_id);
        return view('admin.users.editUser', ['users'=>$user]);
    }

    public function updateUser(Request $request){
       $id= $request->id;
       $users= User::find($id);

       $request->validate([
        'user_name'=>'required|min:3|max:20|unique:users,name,'. $id,
        'user_email'=>'required',
        'user_password'=>'required'
    ]);
        
       $users->name= $request->user_name;
       $users->last_name= $request->last_name;
       $users->email= $request->user_email;
       $users->role= $request->role;
       $users->password= Hash::make($request->user_password);

       $photo_address2= $users->photo;
       $old_photo_address= public_path().'/uploads/'.$photo_address2;

       if(file_exists($old_photo_address)){
           unlink($old_photo_address);
       }

       if($request->photo){
        $photo_address= $request->file('photo')->store('user');
        $users->photo= $photo_address;
    }

       if($users->save()){
        Session::flash('message','user updated successfully');            
        Session::flash('alert','alert-success');            
    }else{
        Session::flash('message','update faild');            
        Session::flash('alert','alert-danger');     
    }
       return redirect('admin/users/user');
    }

    public function deleteUser($user_id){
        
        $photo_address= User::find($user_id)->photo;
        $old_photo_address= public_path().'/uploads/'.$photo_address;
        
        if(file_exists($old_photo_address)){
            unlink($old_photo_address);
        }

        if(User::destroy($user_id)){
            Session::flash('message','user deleted successfully');            
            Session::flash('alert','alert-success');            
        }else{
            Session::flash('message','delete faild');            
            Session::flash('alert','alert-danger');     
        }
        return redirect('admin/users/user');
    }
}
