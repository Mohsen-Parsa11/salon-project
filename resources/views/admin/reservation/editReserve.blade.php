@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Reservation">
    <x-slot name="links">
        <pre> / </pre><li>Reservation</li>
        <pre> / </pre><li>Update Reservation</li>
    </x-slot>
  </x-breadcrumb>
@endsection

@section('mainContent')

    <form action="../updateReserve" method="POST">
        @csrf
        @method('PUT')
        <label for="status" class="fw-bold">Status</label>
        <input type="text" name="status" id="status" class="form-control" value="{{$reserve->status}}">
            @if ($errors->has('status'))
            <span class="text-danger">{{$errors->first('status')}}</span><br>
            @endif
    
        <label for="note" class="fw-bold mt-2">Note</label>
        <input type="text" name="note" id="note" class="form-control" value="{{$reserve->note}}">
        @if ($errors->has('note'))
        <span class="text-danger">{{$errors->first('note')}}</span><br>
        @endif
        
        <input type="hidden" name="id" value="{{$reserve->id}}">

        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection


