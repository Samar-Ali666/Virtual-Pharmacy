@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Clients</h1>
@stop

@section('content')
    <p>See your all clients rom this panel.</p>


    <div class="conttainer-fluid">
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <h4>All Clients</h4>
                </div>
                <div class="col-md-4 w-25">
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered data-table mt-3">
                  <thead>
                    <th>#</th>
                    <th>Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Orders</th>
                    <th>Registered</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                      <td>
                        <img class="border border-success rounded-circle p-1" src="/assets/images/user_icon.png" height="50" alt="">
                      </td>
                      <td>{{$user->firstname}}</td>
                      <td>{{$user->lastname}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->order->count()}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>
                      <td>
                        <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-primary  btn-sm">
                          <i class="fas fa-eye"></i>
                        </a>
                      </td>
                      </tr>
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