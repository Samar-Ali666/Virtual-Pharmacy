@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Manage Categories</h1>
@stop

@section('content')
    <p>Manage categories from this panel.</p>

    <div class="conatainer-fluid">
        @include('admin.includes.errors')
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>All Categories</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-10">
                                        <form method="POST" action="{{ route('category.update', $category->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" class="form-control mb-2" value="{{$category->name}}">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning btn-block mb-2">
                                           <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#addcategorymodal">
                                <i class="fas fa-plus"></i> Add Category</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>category</th>
                                    <th>subcategories</th>
                                    <th>created</th>
                                    <th>updated</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>5</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>{{$category->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm mb-2">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm mb-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form class="d-inline" method="POST" action="{{ route('category.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete? This will delete all subcategories as well')" class="btn btn-danger btn-sm mb-2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $categories->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
<div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('categories.store') }}">
        @csrf
      <div class="modal-body">
        <input type="text" name="name" class="form-control" placeholder="Enter category name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    @include('sweetalert::alert')
@stop