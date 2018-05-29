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
	                    <?php $total = $total + $item->product->real_price * $item->count?>
                        <tr>
                            <td>
                                <img class="ui middle aligned mini image" src="{{asset('images/demo/cloth-532x555.jpg')}}">
                                <span>{{ $item->product->name }}</span>
                            </td>
                            <td>{{ $item->product->currency }} {{ $item->product->real_price }}</td>
                            <td>In Stock</td>
                            <td>
                                <div class="ui input">
                                    <input placeholder="Count" name="count" id="count" type="number" value="{{ $item->count }}">
                                </div>
                            </td>
                            <td>{{ $item->product->currency }} {{ $item->product->real_price * $item->count}}</td>
                            <td class="ui center"><i class="remove icon red"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th  colspan="3"></th>
                        <th></th>
                        <th>${{ $total }}</th>
                        <th>
                            <button class="ui primary button mini">
                                Update cart
                            </button>
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