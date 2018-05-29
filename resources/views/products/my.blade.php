@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fileuploader.css')}}">
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Account</a>
                </div>
            </div>
        </div>
        <div class="ui stackable grid">

            <div class="column sidebar">
                @include('inc.account-sidebar', ['active' => 'my-products'])
            </div>

            <div class="page-conent column">
                @if (session()->has('message'))
                    <div class="ui info message">
                        <ul class="list">
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                @endif

                <div class="ui items">
                    @foreach($products as $product)
                    <div class="item">
                        <div class="ui small image">
                            <a href="{{ route("products.edit", $product->id) }}"><img src="{{ $product->getGeneralImage() }}"></a>
                        </div>
                        <div class="content">
                            <div class="header"><a href="{{ route("products.edit", $product->id) }}">{{ $product->name }}</a></div>
                            <div class="meta">
                                <span class="price">$ {{ $product->price }}</span>
                                <span class="stay">{{ $product->updated_at }}</span>
                            </div>
                            <div class="description">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <?php  echo $products->render() ?>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection