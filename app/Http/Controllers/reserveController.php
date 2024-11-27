<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reserveController extends Controller
{
    public function reserve(){
        return view('admin.reservation.reserve');
    }
}
