@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$category->name}} Category</h1>
@stop

@section('content')
    <p>Manage all sub categories from this panel.</p>

    <div class="conatainer-fluid">
        @include('admin.includes.errors')
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <form method="POST" action="{{ route('category.subcategory.store') }}">
                            @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <h4>{{$category->name}} subcategories</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary btn-block mb-2">&larr;</a>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="hidden" name="category_id" value="{{$category->id}}">
                                        <input type="text" name="name" class="form-control mb-2" placeholder="Enter sub category name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#addcategorymodal">
                                <i class="fas fa-plus"></i> Add Sub Category</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>sub-category</th>
                                    <th>created</th>
                                    <th>updated</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($category->subcategory as $subcate)
                                    <tr>
                                        <td>{{$subcate->id}}</td>
                                        <td>{{$subcate->name}}</td>
                                        <td>{{$subcate->created_at->diffForHumans()}}</td>
                                        <td>{{$subcate->updated_at->diffForHumans()}}</td>
                                        <td>

                                            <a href="{{ route('category.subcategory.edit', $subcate->id) }}" class="btn btn-warning btn-sm mb-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form class="d-inline" method="POST" action="{{ route('category.subcategory.destroy', $subcate->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm mb-2">
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
                            {{-- {!! $categories->links() !!} --}}
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
    @include('sweetalert::alert')
@stop