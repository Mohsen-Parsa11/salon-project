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

        $request->validate([
            'res_status'=>'required|min:3|max:10 |unique:reservations,status',
            'res_note'=>'required'
        ]);
        $reserve= new Reservation();
        $reserve->status= $request->res_status;
        $reserve->note= $request->res_note;
        $reserve->save();
        return redirect('admin/reservation/reserve');
    }

    public function editReserve($res_id){
        $reserve_id= Reservation::find($res_id);
        return view('admin.reservation.editReserve', ['reserve'=>$reserve_id]);
    }

    public function updateReserve(Request $request){
        $id= $request->id;
        $request->validate([
            'status'=>'required|min:3|max:10 |unique:reservations,status,'. $id,
            'note'=>'required'
        ]);
        $reserve= Reservation::find($id);
        $reserve->status= $request->status;
        $reserve->note= $request->note;
        $reserve->save();
        return redirect('admin/reservation/reserve');
    }

    public function reserveDelete($res_id){
        Reservation::destroy($res_id);
        return redirect('admin/reservation/reserve');
    }
}
