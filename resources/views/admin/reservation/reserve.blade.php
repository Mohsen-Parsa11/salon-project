@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Reservation">
    <x-slot name="links">
        <pre> / </pre><li>Reservation</li>
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
                                <h3 class="box-title">Reserve Lists</h3>
                                <a href="addReserve" class="btn btn-outline-primary">Add Reserve</a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Note</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter=1;
                                        @endphp
                                        @foreach ($reserves as $reserve)
                                      <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$reserve->status}}</td>
                                        <td>{{$reserve->note}}</td>
                                        <td>
                                            <a href="editReserve/{{$reserve->id}}" class="btn btn-primary">Edit</a>
                                            <form action="reserveDelete/{{$reserve->id}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete this field?')">Delete</button>
                                            </form>
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