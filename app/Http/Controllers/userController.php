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
        $users->email= $request->user_email;
        $users->password= $request->user_password;
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
        
       $users->name= $request->user_name;
       $users->email= $request->user_email;
       $users->password= $request->user_password;
       $users->save();
       return redirect('admin/users/user');
    }
    public function deleteUser($user_id){
        User::destroy($user_id);
        return redirect('admin/users/user');
    }
}
