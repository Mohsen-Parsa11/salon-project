@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Reservation">
    <x-slot name="links">
        <pre> / </pre><li>Reservation</li>
        <pre> / </pre><li>Add Reservation</li>
    </x-slot>
  </x-breadcrumb>
@endsection

@section('mainContent')

    <form action="save" method="POST">
        @csrf
        <label for="res_status" class="fw-bold">Status</label>
        <input type="text" name="res_status" id="res_status" class="form-control" value="{{old('res_status')}}">
            @if ($errors->has('res_status'))
            <span class="text-danger">{{$errors->first('res_status')}}</span><br>
            @endif
    
        <label for="res_note"res_note class="fw-bold mt-2">Note</label>
        <input type="text" name="res_note" id="res_note" class="form-control" value="{{old('res_note')}}">
        @if ($errors->has('res_note'))
        <span class="text-danger">{{$errors->first('res_note')}}</span><br>
        @endif

        <button class="btn btn-primary mt-3">Save</button>
    </form>
    
@endsection
