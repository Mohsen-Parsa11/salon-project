<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class reserveController extends Controller
{
    public function reserve(){
        $reserve= Reservation::all();
        return view('admin.reservation.reserve',['reserves'=>$reserve]);
    }

    public function addReserve(){
        return view('admin.reservation.addreserve');
    }

    public function saveReserve(Request $request){
        $reserve= new Reservation();
        $reserve->status= $request->res_status;
        $reserve->note= $request->res_note;
        $reserve->save();
        return redirect('admin/reservation/reserve');
    }
}
