@extends('layouts.master')
@section('content')

<div class="row one-column-on-tablet mt-100">
    <div class="column width-3 v-align-middle">
        <div class="box rounded xlarge ">
            <div>
                <h3>Account</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Current orders</a></li>
                    <li><a href="{{ route('user.shipped.orders') }}">Shipped</a></li>
                    <li><a href="{{ route('user.recieved.orders') }}">Received</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mt-50">Settings</h3>
                <ul>
                    <li><a href="#">Change password</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="column width-9 v-align-middle">
        <div class="box rounded xlarge">
            <div>
                <h3>Shipped Orders</h3>
                <p>Showing all your shipped orders.</p>
                <div class="row">
                    <div class="column width-12">
                        <div class="cart-overview">
                            @if(count($orders) > 0)
                            <table class="table non-responsive rounded large">
                                <thead>
                                    <tr>
                                        <th class="product-details">Product</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-quantity">status</th>
                                        <th class="product-subtotal right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    @foreach($order->products as $product)
                                    <tr class="cart-item">
                                        <td class="product-details">
                                            <span>
                                                <img src="{{$product->photo->file}}" class="rounded" width="60" alt=""/>
                                                <span>
                                                    <a href="{{ route('product.single', $product->id) }}" class="product-title">{{$product->name}}</a>
                                                    <span class="product-description"><em>{{$product->category->name}} <span class="amount">-{{$product->subcategory->name}}</span></em></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td class="product-quantity">
                                            <h5>{{$product->pivot->quantity}}</h5>
                                        </td>
                                        <td class="product-quantity">
                                            <span>shipped</span>
                                        </td>
                                        <td class="product-subtotal right">
                                            <span class="amount">PKR {{$product->price * $product->pivot->quantity}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="cart-item">
                                        <td class="product-details">
                                        </td>
                                        <td class="product-details"></td>
                                        <td class="product-details"></td>
                                        <td class="product-subtotal right">
                                            <b>Total: </b> PKR {{$order->total}}
                                        </td>
                                    </tr> 
                                    @endforeach
                                    @else
                                    <div class="row">
                                    <div class="column widht-12 center">
                                        <img src="/assets/images/shop/grid/large-margins/no-order.svg" width="300" alt="">
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="column width-12 center pt-10">
                                            <h2>You don't have any shipped orders</h2>
                                        </div>
                                    </div>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection