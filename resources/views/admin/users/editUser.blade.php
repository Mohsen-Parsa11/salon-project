@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="User">
    <x-slot name="links">
        <pre> / </pre><li>User</li>
        <pre> / </pre><li>Update User</li>
    </x-slot>
  </x-breadcrumb>
@endsection

@section('mainContent')

    <form action="../update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name" class="fw-bold">Name</label>
        <input type="text" name="user_name" id="name" class="form-control" value="{{$users->name}}">
            @if ($errors->has('user_name'))
            <span class="text-danger">{{$errors->first('user_name')}}</span><br>
            @endif

        <label for="last_name" class="fw-bold">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{$users->last_name}}">
            @if ($errors->has('last_name'))
            <span class="text-danger">{{$errors->first('last_name')}}</span><br>
            @endif
    
        <label for="email" class="fw-bold mt-2">Email</label>
        <input type="email" name="user_email" id="email" class="form-control" value="{{$users->email}}">
        @if ($errors->has('user_email'))
        <span class="text-danger">{{$errors->first('user_email')}}</span><br>
        @endif
        
        <input type="hidden" name="id" value="{{$users->id}}">

        <label for="password" class="fw-bold mt-2">password</label>
        <input type="password" name="user_password" id="password" class="form-control" value="{{$users->password}}">
        @if ($errors->has('user_password'))
        <span class="text-danger">{{$errors->first('user_password')}}</span><br>
        @endif

        <label for="photo"></label>
        <input type="file" id="photo" name="photo" class="form-control" >
        @if ($errors->has('photo'))
        <span class="text-danger">{{$errors->first('photo')}}</span><br>
        @endif

        <label for="role" class="fw-bold mt-2">Role</label>
        <select name="role" class="form-select">
            <option value="admin">admin</option>
            <option value="end_user">end_user</option>
        </select>
        @if ($errors->has('role'))
        <span class="text-danger">{{$errors->first('role')}}</span><br>
        @endif


        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection


