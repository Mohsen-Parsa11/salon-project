<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function User(){
        $users= User::all();
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
        $users->password= $request->user_password;
        if($request->photo){
            $photo_address= $request->file('photo')->store('user');
            $users->photo= $photo_address;
        }
        $users->save();
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
       $users->last_name= $request->user_lname;
       $users->email= $request->user_email;
       $users->role= $request->user_role;
       $users->password= $request->user_password;

       $photo_address2= $users->photo;
       $old_photo_address= public_path().'/uploads/'.$photo_address2;

       if(file_exists($old_photo_address)){
           unlink($old_photo_address);
       }

       if($request->photo){
        $photo_address= $request->file('photo')->store('user');
        $users->photo= $photo_address;
    }

       $users->save();
       return redirect('admin/users/user');
    }

    public function deleteUser($user_id){
        User::destroy($user_id);

        $photo_address2= User::find($user_id)->photo;
        $old_photo_address= public_path().'/uploads/'.$photo_address2;
        
        if(file_exists($old_photo_address)){
            unlink($old_photo_address);
        }
        return redirect('admin/users/user');
    }
}
