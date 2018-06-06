@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Products</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Stylish Chair </a>
                </div>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="ui info message">
                <ul class="list">
                    <li>{{ session()->get('message') }}</li>
                </ul>
            </div>
        @endif
        <div class="ui stackable  grid">
            <div class="sixteen wide column">
                <table class="ui celled selectable table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>



                    <?php
                    $total = 0;
                    ?>
                    @foreach($user->carts as $item)
	                    <?php $total = $total + $item->product->real_price * $item->count;
	                    ?>
                        <tr>
                            <td>
                                <a href="{{ route("products.show", $item->product_id) }}"><img class="ui middle aligned mini image" src="{{imake\Image::getThumb($item->product()->first()->images()->first()->file, [100, 100])}}"></a>
                                <a href="{{ route("products.show", $item->product_id) }}">{{ $item->product->name }}</a>
                            </td>
                            <td>{{ $item->product->currency }} {{ $item->product->real_price }}</td>
                            <td>In Stock</td>
                            <td>
                                {{ $item->count }}
                            </td>
                            <td>{{ $item->product->currency }} {{ $item->product->real_price * $item->count}}</td>
                            <form method="post" action="{{ route("cart.destroy") }}">
                                {{ csrf_field() }}
                                <input type="hidden" name='cart_id' value="{{ $item->id }}">
                                <td>
                                    <button class="ui button mini" onclick="return confirm('Delete product?')">
                                        <i class="remove icon red"></i>Remove
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th  colspan="3"></th>
                        <th></th>
                        <th>${{ $total }}</th>
                        <th>
                            {{--<button class="ui primary button mini">
                                Update cart
                            </button>--}}
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="eight wide column">

            </div>
            <div class="eight wide column">
                <table class="ui single line table">
                    <thead>
                    <tr>
                        <th colspan="2">Cart Totals</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td>${{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free Shipping</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>${{ $total }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="ui divider"></div>
                <div class="ui column">
                    <button class="ui primary button right floated ">
                        Proceed to Checkout
                    </button>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('footer')
    @parent
@endsection