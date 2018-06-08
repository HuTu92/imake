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
                            <a href="{{ route("products.show", $product->id) }}"><img src="{{  \imake\Image::getThumb($product->getGeneralImage(), [400,400]) }}"></a>
                        </div>
                        <div class="content">
                            <div class="header"><a href="{{ route("products.show", $product->id) }}">{{ $product->name }}</a></div>
                            <div class="meta">
                                <span class="price popup" data-content="Price"><i class="dollar sign icon"></i> {{ $product->real_price }}</span>
                                <span class="stock popup" data-content="Stock"><i class="cubes icon"></i> {{ $product->getStock() }}</span>
                            </div>
                            <div class="categories">
                                @foreach($product->categories as $category)
                                    {{ ucfirst($category->category_name)}},
                                @endforeach
                            </div>

                            <form method="POST" action="{{route('products.status')}}" class="inline-forms">
                                {{csrf_field()}}
                                {{--TODO make product enable disable logic--}}
                                @if(!$product->disable)
                                    @php $button = 'Disable'; $color = 'grey'; $set='1'; $icon = 'times';@endphp
                                @else
                                    @php $button = 'Enable'; $color = 'blue'; $set='0'; $icon = 'check'; @endphp
                                @endif
                                <input type="hidden" name="product_status" value="{{$set}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <button class="mini ui button {{$color}} " type="submit" >
                                    <i class="{{$icon}} icon"></i>
                                    {{$button}}
                                </button>
                                <a class="mini ui button blue " href="{{ route("products.edit", $product->id) }}">
                                    <i class="edit icon"></i>
                                    Edit
                                </a>
                            </form>

                            <form method="POST" action="{{route('products.delete')}}" class="inline-forms">
                                {{csrf_field()}}
                                <button class="mini ui button red" type="submit"  onclick="return confirm('Delete product?')">
                                    <i class="trash icon"></i>
                                    Delete
                                </button>
                                <input type="hidden" name="product_delete" value="{{$product->id}}" >
                            </form>

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