<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingController extends Controller
{
    public function addSetting(){
        return view('admin.setting.set');
    }
}
