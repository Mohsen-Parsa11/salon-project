@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="User">
    <x-slot name="links">
        <pre> / </pre><li>User</li>
    </x-slot>
  </x-breadcrumb>
@endsection

@section('mainContent')

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
                                            <th class="border-top-0">Email</th>
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
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <button class="btn btn-danger text-white">Delete</button>
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
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