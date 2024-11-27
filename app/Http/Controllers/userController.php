<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function addUser(){
        return view('admin.users.user');
    }
}
