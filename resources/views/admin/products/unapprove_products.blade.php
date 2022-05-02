@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Unapproved Products</h1>
@stop

@section('content')
    <p>Watch all unapproved products from this admin panel.</p>
    
    <div class="container-fuild">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">Unapprove Products</h3>
                        <div class="table-responsive">
                            <table class="table table-hover mt-3">
                                <thead>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>PDF</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Approval</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($unapprove_products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{$product->photo->file}}" height="50px" alt=""></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->company}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->subcategory->name}}</td>
                                        <td><a href="{{$product->pdf->file}}">Description</a></td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$product->price}} Rs</td>
                                        <td>
                                            <span class="badge badge-warning">Unapprove</span>
                                        </td>
                                        <td>{{$product->created_at->diffForHumans()}}</td>
                                        <td>{{$product->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {!! $products->links() !!} --}}
                            </div>
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