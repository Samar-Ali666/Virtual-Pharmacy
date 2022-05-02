@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$subcategory->category->name}} Category</h1>
@stop

@section('content')
    <p>Manage all sub categories from this panel.</p>

    <div class="conatainer-fluid">
        @include('admin.includes.errors')
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <form method="POST" action="{{ route('category.subcategory.update', $subcategory->id) }}">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <h4>{{$subcategory->category->name}} subcategories</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="category_id" value="{{$subcategory->category->id}}">
                                        <input type="text" name="name" class="form-control mb-2" value="{{$subcategory->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-warning btn-block">
                                <i class="fas fa-pencil-alt"></i> Edit Sub Category</button>
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
                                    @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{$subcategory->id}}</td>
                                        <td>{{$subcategory->name}}</td>
                                        <td>{{$subcategory->created_at->diffForHumans()}}</td>
                                        <td>{{$subcategory->updated_at->diffForHumans()}}</td>
                                        <td>

                                            <a href="{{ route('category.subcategory.edit', $subcategory->id) }}" class="btn btn-warning btn-sm mb-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form class="d-inline" method="POST" action="{{ route('category.subcategory.destroy', $subcategory->id) }}">
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