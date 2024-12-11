<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class myController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function change_language($lang){
        $language= $lang;
        Session::put('change_language', $language);
        return back();
    }
}
