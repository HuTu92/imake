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
                    <a class="section">{{$product->name}} </a>
                </div>
            </div>
        </div>
        <div class="ui stackable grid">
            <div class="page-conent column">
                @if ($errors->all())
                    <div class="ui error message">
                        <ul class="list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="ui info message">
                        <ul class="list">
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="ui stackable grid product-info-first">
                    <div class="eight wide column">


                        @if($product->images->count())
                        <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-hash="true" data-keyboard="true">
                            @foreach($product->images as $image)
                                <img src="{{ $image->file }}" alt="">
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="eight wide column">

                        <h2 class="ui header">
                            {{$product->name}}
                            <div class="sub header">{{$product->user->name}} {{$product->user->last_name}}</div>
                        </h2>
                        <p class="ui blue header">{{$product->currency}} {{ $product->regular_price }}  @if($product->sale_price) -  {{$product->currency}} {{ $product->sale_price }} @endif</p>
                        <div class="ui star rating" data-rating="3"></div>
                        {{--<div class="content">
                            {{$product->description}}
                        </div>--}}
                            @if(empty($unattainable))
                                <form method="post" action="{{ route("cart.update") }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" readonly>
                                    <div class="attributes-and-color">
                                        @if($product->colors->count())
                                        <div class="ui sub header">Color</div>
                                        <select class="ui search dropdown">
                                            @foreach($product->colors as $color)
                                                <option value="{{ $color->id}}">{{ ucfirst($color->color_name)}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                        <div class="ui input">
                                            <input placeholder="Count" name="count" id="count" type="number" min="1">
                                        </div>
                                    </div>
                                    <div class="total-add-to-card" style="display: none">
                                        <div class="ui divider"></div>
                                        <span class="ui blue header total"></span>
                                        <button class="ui basic active blue button right floated add-to-cart" >
                                            Add to cart
                                            <i class="cart icon"></i>
                                        </button>
                                        <div class="ui divider"></div>
                                    </div>
                                </form>
                            @endif
                        <div class="ui divided selection list">
                            @if($product->categories->count())
                            <a class="item">
                                <b>Categories: </b>
                                @foreach($product->categories as $category)
                                    {{ ucfirst($category->category_name)}},
                                @endforeach
                            </a>
                            @endif
                            @if($product->colors->count())
                            <a class="item">
                                <b>Colors: </b>
                                @foreach($product->colors as $color)
                                    {{ ucfirst($color->color_name)}},
                                @endforeach
                            </a>
                            @endif
                            <a class="item">
                                <b>Ships From: </b>
                                France, Russia, USA
                            </a>
                            @if($product->vendor->shop_name)
                            <a class="item">
                                <b>Sold By: </b>
                                {{$product->vendor->shop_name}}
                            </a>
                            @endif
                            <a class="item">
                                <b>SKU: </b>
                                N/A
                            </a>
                            @if($product->tags->count())
                                <a class="item">
                                    <b>Tags: </b>
                                    @foreach($product->tags as $tag)
                                        {{ ucfirst($tag->tag_name)}},
                                    @endforeach
                                </a>
                            @endif
                        </div>
                        <div class="social-buttons mini">
                            <button class="ui facebook button mini">
                                <i class="facebook icon"></i>
                                Facebook
                            </button>
                            <button class="ui twitter button mini">
                                <i class="twitter icon"></i>
                                Twitter
                            </button>
                            <button class="ui google plus button mini">
                                <i class="google plus icon"></i>
                                Google Plus
                            </button>
                            <button class="ui vk button mini">
                                <i class="vk icon"></i>
                                VK
                            </button>
                        </div>

                    </div>
                </div>
                <div class="ui top attached tabular tabs menu">
                    <a class="item active" data-tab="first"><i class="icon browser"></i> <span>Description</span></a>
                    <a class="item" data-tab="second"><i class="icon tags"></i> <span>Specification</span></a>
                    <a class="item" data-tab="third"><i class="icon comments outline"></i> <span>
                            @php $count = $product->comments->count() @endphp
                            {{ $count }}
                            @if($count > 1)
                                Comments
                            @else
                                Comment
                            @endif
                             </span></a>
                </div>
                <div class="ui bottom attached tab segment active" data-tab="first">

                    {!! $product->description !!}

                </div>
                <div class="ui bottom attached tab segment " data-tab="second">
                    <div class="ui divided selection list">
                        <a class="item">
                            <b>Ships From: </b>
                            France, Russia, USA
                        </a>
                        <a class="item">
                            <b>Sold By: </b>
                            Vendor Shop Example
                        </a>
                        <a class="item">
                            <b>SKU: </b>
                            N/A
                        </a>
                        <a class="item">
                            <b>Weight: </b>
                            {{ $product->weight or "N/A"}}
                        </a><a class="item">
                            <b>Length: </b>
                            {{ $product->lenght or "N/A"}}
                        </a><a class="item">
                            <b>Width: </b>
                            {{ $product->width or "N/A"}}
                        </a><a class="item">
                            <b>Height: </b>
                            {{ $product->height or "N/A"}}
                        </a>
                    </div>
                </div>
                <div class="ui bottom attached tab segment" data-tab="third">
                    <div class="ui small comments">
                    @foreach($product->comments as $comment)
                        <div class="comment">
                            <a class="avatar">
                                <img src="{{ $comment->user->getAvatar() }}">
                            </a>
                            <div class="content">
                                <a class="author">{{ $comment->user->name }}</a>
                                {{--<div class="ui mini star rating" data-rating="4"></div>--}}
                                <div class="metadata">
                                    <span class="date">{{ $comment->created_at }}</span>
                                </div>
                                <div class="text">
                                    {!! $comment->comment !!}
                                </div>
                                {{--<div class="actions">
                                    <a class="reply">Reply</a>
                                </div>--}}
                            </div>
                        </div>
                    @endforeach
                    </div>
                    @if(Auth::user())

                        <form class="ui reply form" method="post" action="{{ route('product.comment') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name='product_id' value="{{ $product->id }}">
                            <div class="field">
                                <textarea name='comment' required></textarea>
                            </div>
                            <div class="divider"></div>
                            <button class="ui blue labeled submit icon button">
                                <i class="icon comment"></i> Add comment
                            </button>
                        </form>
                    @endif
                    </div>
            </div>
            <div class="column sidebar">
                <h3 class="ui top attached header">
                    Specials
                </h3>

                <div class="ui attached segment">
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <img src="{{ asset('images/demo/clocks-500x500.jpg') }}" class="ui tiny image" alt="">
                            <div class="content">
                                <a class="header">Semantic-Org/Semantic-UI</a>
                                <p></p>
                                <span class="ui label old-price"> $ 180 </span>
                                <div class="ui left pointing label teal ">
                                    $ 150
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/demo/Classic-Clock-500x500.jpg') }}" class="ui tiny image" alt="">
                            <div class="content">
                                <a class="header">Semantic-Org/Semantic-UI-Docs</a>
                                <p></p>
                                <span class="ui blue basic label old-price">$ 120</span>
                                <div class="ui left pointing label teal ">
                                    $ 90
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui tiny image" alt="">
                            <div class="content">
                                <a class="header">Semantic-Org/Semantic-UI-Met fg dfg dfgdfg dfgdf geor</a>
                                <p></p>
                                <div class="ui image label">
                                    <img src="{{ asset('images/demo/matt.jpg') }}">
                                    Adrienne
                                    <i class="delete icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui clearing divider"></div>
                <div class="bannerhover">
                    <figure class="effect-chico">
                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" alt="img12" />
                        <figcaption>
                            <div>
                                <h2>Nice <span>Lily</span></h2>
                                <p>Lily likes to play with crayons and pencils</p>
                            </div>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="ui clearing divider"></div>
                <div class="ui attached segment ">
                    <h2 class="ui header">tags</h2>
                    <div class="ui clearing divider"></div>
                    <div class="ui teal labels mini">
                        <a class="ui label">
                            Fun <i class="icon close"></i>
                        </a>
                        <a class="ui label">
                            Happy
                            <div class="detail">22</div>
                        </a>
                        <a class="ui label">
                            Smart
                        </a>
                        <a class="ui label">
                            Insane
                        </a>
                        <a class="ui label">
                            Exciting
                        </a>
                        <a class="ui label">
                            Fun <i class="icon close"></i>
                        </a>
                        <a class="ui label">
                            Happy
                            <div class="detail">22</div>
                        </a>
                        <a class="ui label">
                            Smart
                        </a>
                        <a class="ui label">
                            Insane
                        </a>
                        <a class="ui label">
                            Exciting
                        </a>
                        <a class="ui label">
                            Fun <i class="icon close"></i>
                        </a>
                        <a class="ui label">
                            Happy
                            <div class="detail">22</div>
                        </a>
                        <a class="ui label">
                            Smart
                        </a>
                        <a class="ui label">
                            Insane
                        </a>
                        <a class="ui label">
                            Exciting
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="{{asset('css/fotorama.css')}}">
        <script src="{{asset('js/fotorama.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('.tabs .item').tab();
                calculateTotal(150, $('#count').val());

                $('#count').bind('keyup change', function () {
                    calculateTotal(150, $(this).val())
                });


                function calculateTotal(sum, count) {
                    var total =  sum*count;
                    if(total > 0){
                        $('.total').text('Total: $'+count*150);
                        $('.total-add-to-card').show();

                    }else{
                        $('.total-add-to-card').hide();
                    }
                }
                var $fotoramaDiv = $('.fotorama').fotorama();
                var fotorama = $fotoramaDiv.data('fotorama');

                $('.ui.dropdown').dropdown({
                    onChange:function (value, text, $choice) {
                        if(value == 'orange'){
                            var img = 2;
                        }else if(value == 'black'){
                            var img = 1;
                        }else if(value == 'blue'){
                            var img = 0;
                        }
                        if(img >= -1){
                            fotorama.show(img);
                        }
                    }
                });

            })
        </script>

    </div>

@endsection
@section('footer')
    @parent
@endsection