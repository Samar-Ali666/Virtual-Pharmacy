@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-3">
                <x-adminlte-info-box title="{{count($products)}}" text="Products" icon="fas fa-lg fa-folder text-info"
    theme="gradient-info" icon-theme="white"/>
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="{{count($categories)}}" text="Categories" icon="fab fa-accusoft text-success"
    theme="gradient-success" icon-theme="white"/>
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="{{count($users)}}" text="Customers" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-primary" icon-theme="white"/>
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="{{count($staffs)}}" text="Staff" icon="fas fa-lg fa-user-shield text-info"
    theme="gradient-info" icon-theme="white"/>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="173"></canvas>
                    </div>
                </div>
                <div class="card shadow border border-success">
                    <div class="card-body">
                        <div class="row text-center py-3">
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <a href="{{ route('product.create') }}" type="button" class="btn btn-success btn-lg">
                                       <i class="fa fa-plus"></i> Create Product
                                    </a>
                                  <a href="{{ route('categories.index') }}" type="button" class="btn btn-outline-primary btn-lg">
                                      <i class="fa fa-plus"></i> Create Category
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h4>Users</h4>
                            </div>
                            <div class="col-md-3">
                                {{$users->links()}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Orders</th>
                                    <th>Registered</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <img class="border border-success rounded-circle p-1" src="/assets/images/user_icon.png" height="50" alt="">
                                        </td>
                                        <td>{{$user->firstname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{count($user->order)}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-primary btn-sm">
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('admin.charts.sales_chart')
@stop