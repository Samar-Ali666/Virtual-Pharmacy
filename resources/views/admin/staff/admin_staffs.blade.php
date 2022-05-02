@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Staff members</h1>
@stop

@section('content')
    <p>See your all staff members rom this panel.</p>


    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <h4>All Staff</h4>
                </div>
                <div class="col-md-4">
                  <form action="{{ route('admin.staff.search') }}" method="POST">
                    @csrf
                    <div class="input-group">
                    <input type="text" name="staff_search" class="form-control" placeholder="Search all staff">
                    <div class="input-group-append">
                      <button class="btn btn-success">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table mt-3">
                  <thead>
                    <th>#</th>
                    <th>Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Products</th>
                    <th>Status</th>
                    <th>Registered</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @foreach($staffs as $staff)
                      <td>{{$staff->id}}</td>
                      <td>
                        <img class="border border-success rounded-circle p-1" src="/assets/images/user_icon.png" height="50" alt="">
                      </td>
                      <td>{{$staff->firstname}}</td>
                      <td>{{$staff->lastname}}</td>
                      <td>{{$staff->email}}</td>
                      <td>{{$staff->product->count()}}</td>
                      <td><span class="badge badge-success">Approved</span></td>
                      <td>{{$staff->created_at->diffForHumans()}}</td>
                      <td>{{$staff->updated_at->diffForHumans()}}</td>
                      <td>
                        <a href="{{ route('admin.staff.show', $staff->id) }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-eye"></i>
                        </a>
                      </td>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
@stop

@section('css')
    
@stop

@section('js')

@stop 