@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="User">
    <x-slot name="links">
        <pre> / </pre><li>User</li>
    </x-slot>
  </x-breadcrumb>
@endsection 

@section('mainContent')

@section('alertMessage')
@if(Session::has('message'))
<x-message cls="{{Session::get('alert')}}" text="{{Session::get('message')}}"></x-message>  
@endif
@endsection

  <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="d-flex justify-content-between">
                                <h3 class="box-title">User Lists</h3>
                                <a href="addUsers" class="btn btn-outline-primary">Add user</a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Last Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Photo</th>
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter=1;
                                        @endphp
                                        @foreach ($users as $user)
                                      <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->photo)
                                            <img style="width:70px; height:60px;" src="{{asset('uploads/'.$user->photo)}}" alt="user">
                                            @endif    
                                        </td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a href="edit/{{$user->id}}" class="btn btn-primary">Edit</a>
                                            <form action="deleteUser/{{$user->id}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete this field?')">Delete</button>
                                            </form>
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                {{$users->links('pagination::bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End of Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->


@endsection

<script>
    setTimeout(() => {
        var alerts= document.getElementsByClassName("alert");
        if(alerts.length > 0){
            alerts[0].remove();
        }
    }, 3000);
</script>