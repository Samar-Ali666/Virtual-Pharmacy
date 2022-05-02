@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Unapproved Members</h1>
@stop

@section('content')
    <p>See your all staff members rom this panel.</p>


    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
                  <h4>Unapproved Staff Member</h4>
              </div>

              @if(count($unapprovedStaff) > 0)
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
                    @foreach($unapprovedStaff as $staff)
                      <td>{{$staff->id}}</td>
                      <td>
                        <img class="border border-success rounded-circle p-1" src="/assets/images/user_icon.png" height="50" alt="">
                      </td>
                      <td>{{$staff->firstname}}</td>
                      <td>{{$staff->lastname}}</td>
                      <td>{{$staff->email}}</td>
                      <td>{{$staff->product->count()}}</td>
                      <td><span class="badge badge-warning">Unapproved</span></td>
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
              @else
              <div class="row text-center">
                <div class="col-md-12">
                  <img src="/assets/images/shop/grid/large-margins/no-products.svg" width="300" alt="">
                  <h4 class="mt-2">No unapproved member yet</h4>
                </div>
              </div>
              @endif
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