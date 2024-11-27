<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class timesController extends Controller
{
    public function addTimes(){
        return view('admin.times.time');
    }
}
