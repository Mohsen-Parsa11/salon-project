<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Session;


class reserveController extends Controller
{
    public function reserve(){
        $reserve= Reservation::paginate(6);
        return view('admin.reservation.reserve',['reserves'=>$reserve]);
    }

    public function addReserve(){
        return view('admin.reservation.addreserve');
    }

    public function saveReserve(Request $request){

        $request->validate([
            'res_status'=>'required|min:3|max:10',
            'res_note'=>'required'
        ]);
        $reserve= new Reservation();
        $reserve->status= $request->res_status;
        $reserve->note= $request->res_note;
        if($reserve->save()){
            Session::flash('message','reservation inserted successfully');            
            Session::flash('alert','alert-success');            
        }else{
            Session::flash('message','insert faild');            
            Session::flash('alert','alert-danger');     
        }
        return redirect('admin/reservation/reserve');
    }

    public function editReserve($res_id){
        $reserve_id= Reservation::find($res_id);
        return view('admin.reservation.editReserve', ['reserve'=>$reserve_id]);
    }

    public function updateReserve(Request $request){
        $id= $request->id;
        $request->validate([
            'status'=>'required|min:3|max:10',
            'note'=>'required'
        ]);
        $reserve= Reservation::find($id);
        $reserve->status= $request->status;
        $reserve->note= $request->note;
        if($reserve->save()){
            Session::flash('message','reservation updated successfully');            
            Session::flash('alert','alert-success');            
        }else{
            Session::flash('message','update faild');            
            Session::flash('alert','alert-danger');     
        }
        return redirect('admin/reservation/reserve');
    }

    public function reserveDelete($res_id){
        
        if(Reservation::destroy($res_id)){
            Session::flash('message','reservation deleted successfully');            
            Session::flash('alert','alert-success');            
        }else{
            Session::flash('message','delete faild');            
            Session::flash('alert','alert-danger');     
        }
        return redirect('admin/reservation/reserve');
    }
}
