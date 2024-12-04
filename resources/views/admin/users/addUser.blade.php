@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="User">
    <x-slot name="links">
        <pre> / </pre><li>User</li>
        <pre> / </pre><li>Add User</li>
    </x-slot>
  </x-breadcrumb>
@endsection

@section('mainContent')

    <form action="save" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name" class="fw-bold">Name</label>
        <input type="text" name="user_name" id="name" class="form-control" value="{{old('user_name')}}">
            @if ($errors->has('user_name'))
            <span class="text-danger">{{$errors->first('user_name')}}</span><br>
            @endif

        <label for="user_lname" class="fw-bold">Last Name</label>
        <input type="text" name="user_lname" id="user_lname" class="form-control" value="{{old('user_lname')}}">
            @if ($errors->has('user_lname'))
            <span class="text-danger">{{$errors->first('user_lname')}}</span><br>
            @endif
    
        <label for="email" class="fw-bold mt-2">Email</label>
        <input type="email" name="user_email" id="email" class="form-control" value="{{old('user_email')}}">
        @if ($errors->has('user_email'))
        <span class="text-danger">{{$errors->first('user_email')}}</span><br>
        @endif

        <label for="photo" class="fw-bold mt-2">Photo</label>
        <input type="file" name="photo" id="email" class="form-control" value="{{old('photo')}}">
        @if ($errors->has('photo'))
        <span class="text-danger">{{$errors->first('photo')}}</span><br>
        @endif

        <label for="password" class="fw-bold mt-2">password</label>
        <input type="password" name="user_password" id="password" class="form-control" value="{{old('user_password')}}">
        @if ($errors->has('user_password'))
        <span class="text-danger">{{$errors->first('user_password')}}</span><br>
        @endif

        <label for="role" class="fw-bold mt-2">Role</label>
        <input type="text" name="user_role" id="role" class="form-control" value="{{old('user_role')}}">
        @if ($errors->has('user_role'))
        <span class="text-danger">{{$errors->first('user_role')}}</span><br>
        @endif

        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection