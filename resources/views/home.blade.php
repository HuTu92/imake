@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui stackable grid">
            @section('categories')
                <div class="column sidebar">
                    <div class="ui vertical menu">
                        <a class="active teal item" >
                            <img class="category-icon" src="{{asset('images/icons/emoticons-24px-outline_cake.png')}}"
                                 alt="">
                            Birthday Gifts
                            <div class="ui teal left pointing label">1</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/shopping-24px-outline_gift.png')}}"
                                 alt="">
                            KitchenCitchen Things
                            <div class="ui label">51</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/business-24px-outline_bank.png')}}"
                                 alt="">
                            Decor Art
                            <div class="ui label">88</div>
                        </a>
                        <a class="item">
                            <img class="category-icon"
                                 src="{{asset('images/icons/business-24px-outline_wallet-43.png')}}" alt="">
                            TodayEvery Day
                            <div class="ui label">98</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/food-24px-outline_chinese.png')}}"
                                 alt="">
                            Furniture
                            <div class="ui label">98</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/food-24px-outline_coffe-long.png')}}"
                                 alt="">
                            Illumination
                            <div class="ui label">8</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/nature-24px-outline_flower-05.png')}}"
                                 alt="">
                            Champagne Party
                            <div class="ui label">568</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/users-24px-outline_single-05.png')}}"
                                 alt="">
                            Personal
                            <div class="ui label">55</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/ui-24px-outline-3_heart.png')}}"
                                 alt="">
                            Romantic
                            <div class="ui label">3</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/media-24px-outline-1_image-02.png')}}"
                                 alt="">
                            Fire Special Goods
                            <div class="ui label">12</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/ui-24px-outline-1_bell-54.png')}}"
                                 alt="">
                            Teddy BearToys
                            <div class="ui label">41</div>
                        </a>
                        <a class="item">
                            <img class="category-icon" src="{{asset('images/icons/design-24px-outline_bug.png')}}"
                                 alt="">
                            Variables
                            <div class="ui label">91</div>
                        </a>
                        <a class="item">
                            <img class="category-icon"
                                 src="{{asset('images/icons/business-24px-outline_board-27.png')}}" alt="">
                            Vintage
                            <div class="ui label">8</div>
                        </a>
                        <div class="item">
                            <div class="ui transparent icon input">
                                <input placeholder="Search category..." type="text">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @show
            <div class="page-conent column">
                <div class="slider">
                    <img class="ui fluid image" src="{{asset('images//demo/slide.png')}}">
                </div>
            </div>
        </div>
        <div class="ui stackable grid">
            <div class="column sidebar">

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
                            <img src="{{ asset('images/demo/Classic-Clock-500x500.jpg') }}" class="ui tiny image"
                                 alt="">
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
                        <img src="{{ asset('images/demo/cloth-532x555.jpg') }}" alt="img12"/>
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
                    <h2 class="ui header">Sale</h2>
                    <div class="ui clearing divider"></div>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <img src="{{ asset('images/demo/dishcloth-532x555.jpg') }}" class="ui tiny image" alt="">
                            <div class="content">
                                <a class="header">Semantic-Org/Semantic-UI</a>
                                <p></p>
                                <div class="extra">
                                    Rating:
                                    <div class="ui star rating" data-rating="4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/demo/Saxon_White-500x500.jpg') }}" class="ui tiny image" alt="">
                            <div class="content">
                                <a class="header">Semantic-Org/Semantic-UI-Docs</a>
                                <p></p>
                                <div class="extra">
                                    Rating:
                                    <div class="ui star rating" data-rating="2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui tiny image" alt="">
                            <div class="content">
                                <a class="header">Semantic-Org/Semantic-UI-Met fg dfg dfgdfg dfgdf geor</a>
                                <p></p>
                                <div class="extra">
                                    Rating:
                                    <div class="ui star rating" data-rating="2"></div>
                                </div>
                            </div>
                        </div>

                    </div>

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
            <div class="page-conent column">
                <div class="ui bannerhover">
                    <figure class="effect-sarah banner-long">
                        <img src="{{ asset('images/demo/longbanner.jpg') }}" alt="img12">
                        <figcaption>
                            <div>
                                <h2>Nice <span>Lily</span></h2>
                                <p>Lily likes to play with crayons and pencils</p>
                            </div>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>

                <div class="ui stackable grid">
                    <div class="eight wide column">
                        <div class="bannerhover">
                            <figure class="effect-chico">
                                <img src="{{ asset('images/demo/OH3DLR0.jpg') }}" alt="img12"/>
                                <figcaption>
                                    <div>
                                        <h2>Nice <span>Lily</span></h2>
                                        <p>Lily likes to play with crayons and pencils</p>
                                    </div>
                                    <a href="#">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="eight wide column">
                        <div class="bannerhover">
                            <figure class="effect-chico">
                                <img src="{{ asset('images/demo/OK89EH0.jpg') }}" alt="img12"/>
                                <figcaption>
                                    <div>
                                        <h2>Nice <span>Lily</span></h2>
                                        <p>Lily likes to play with crayons and pencils</p>
                                    </div>
                                    <a href="#">View more</a>
                                </figcaption>
                            </figure>
                        </div>

                    </div>
                </div>

                <div class="ui grid">

                    <h4 class="ui horizontal divider header">
                        <i class="tag icon"></i>
                        Best Sellers
                    </h4>

                    <div  id="carousel-bestsellers" class="owl-carousel owl-theme">
                        <div  class="ui cards">
                            <div class="card product">
                                <div class="image attachment">
                                    <img class="product-image" src="{{ asset('images/demo/pillow-500x500.jpg') }}">
                                    <div class="mini-icons">
                                        <img class="ui image mini" src="{{ asset('images/demo/elliot.jpg') }}">
                                        <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                        <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                    </div>
                                    <div class="mini-attachments">
                                        <img src="{{ asset('images/demo/pillow-b-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui mini image">
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="/products/2" class="header">Stylish Chair</a>
                                    <div class="meta">
                                        <a>Decoration, Exclusive, Office</a>
                                    </div>
                                    <div class="description">
                                        <div class="ui top right attached label blue">NEW</div>
                                        $15.0 -  $35.0
                                    </div> 
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                    Joined in 2014
                                    </span>
                                    <div class="right floated meta">14h</div>
                                    <img class="ui avatar image" src="{{ asset('images/demo/elliot.jpg') }}"> Elliot
                                </div>
                            </div>
                        </div>
                        <div  class="ui cards">
                            <div class="card product">
                                <div class="image attachment">
                                    <img class="product-image" src="{{ asset('images/demo/pillow4-500x500.jpg') }}">
                                    <div class="mini-icons">
                                        <img class="ui image mini" src="{{ asset('images/demo/elliot.jpg') }}">
                                        <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                        <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                    </div>

                                    <div class="mini-attachments">
                                        <img src="{{ asset('images/demo/pillow-b-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui mini image">
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="/products/2" class="header">Stylish Chair</a>
                                    <div class="meta">
                                        <a>Decoration, Exclusive, Office</a>
                                    </div>
                                    <div class="description">
                                        <div class="ui top right attached label blue">NEW</div>
                                        $15.0 -  $35.0
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                    Joined in 2014
                                    </span>
                                    <div class="right floated meta">14h</div>
                                    <img class="ui avatar image" src="{{ asset('images/demo/elliot.jpg') }}"> Elliot
                                </div>
                            </div>
                        </div>
                        <div  class="ui cards">
                            <div class="card product">
                                <div class="image attachment">
                                    <img class="product-image" src="{{ asset('images/demo/pillow-b-500x500.jpg') }}">
                                    <div class="mini-icons">
                                        <img class="ui image mini" src="{{ asset('images/demo/elliot.jpg') }}">
                                        <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                        <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                    </div>

                                    <div class="mini-attachments">
                                        <img src="{{ asset('images/demo/pillow-b-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui mini image">
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="/products/2" class="header">Stylish Chair</a>
                                    <div class="meta">
                                        <a>Decoration, Exclusive, Office</a>
                                    </div>
                                    <div class="description">
                                        <div class="ui top right attached label blue">NEW</div>
                                        $15.0 -  $35.0
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                    Joined in 2014
                                    </span>
                                    <div class="right floated meta">14h</div>
                                    <img class="ui avatar image" src="{{ asset('images/demo/elliot.jpg') }}"> Elliot
                                </div>
                            </div>
                        </div>
                        <div  class="ui cards">
                            <div class="card product">
                                <div class="image attachment">
                                    <img class="product-image" src="{{ asset('images/demo/pillow-b-500x500.jpg') }}">
                                    <div class="mini-icons">
                                        <img class="ui image mini" src="{{ asset('images/demo/elliot.jpg') }}">
                                        <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                        <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                    </div>

                                    <div class="mini-attachments">
                                        <img src="{{ asset('images/demo/pillow-b-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui mini image">
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="/products/2" class="header">Stylish Chair</a>
                                    <div class="meta">
                                        <a>Decoration, Exclusive, Office</a>
                                    </div>
                                    <div class="description">
                                        <div class="ui top right attached label blue">NEW</div>
                                        $15.0 -  $35.0
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                    Joined in 2014
                                    </span>
                                    <div class="right floated meta">14h</div>
                                    <img class="ui avatar image" src="{{ asset('images/demo/elliot.jpg') }}"> Elliot
                                </div>
                            </div>
                        </div>
                        <div  class="ui cards">
                            <div class="card product">
                                <div class="image attachment">
                                    <img class="product-image" src="{{ asset('images/demo/pillow-b-500x500.jpg') }}">
                                    <div class="mini-icons">
                                        <img class="ui image mini" src="{{ asset('images/demo/elliot.jpg') }}">
                                        <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                        <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                    </div>

                                    <div class="mini-attachments">
                                        <img src="{{ asset('images/demo/pillow-b-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui mini image">
                                    </div>
                                </div>
                                <div class="content">
                                   <a href="/products/2" class="header">Stylish Chair</a>
                                    <div class="meta">
                                        <a>Decoration, Exclusive, Office</a>
                                    </div>
                                    <div class="description">
                                        <div class="ui top right attached label blue">NEW</div>
                                        $15.0 -  $35.0
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                    Joined in 2014
                                    </span>
                                    <div class="right floated meta">14h</div>
                                    <img class="ui avatar image" src="{{ asset('images/demo/elliot.jpg') }}"> Elliot
                                </div>
                            </div>
                        </div>
                        <div  class="ui cards">
                            <div class="card product">
                                <div class="image attachment">
                                    <img class="product-image" src="{{ asset('images/demo/pillow-b-500x500.jpg') }}">
                                    <div class="mini-icons">
                                        <img class="ui image mini" src="{{ asset('images/demo/elliot.jpg') }}">
                                        <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                        <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                    </div>

                                    <div class="mini-attachments">
                                        <img src="{{ asset('images/demo/pillow-b-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow-500x500.jpg') }}" class="ui mini image">
                                        <img src="{{ asset('images/demo/pillow4-500x500.jpg') }}" class="ui mini image">
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="/products/2" class="header">Stylish Chair</a>
                                    <div class="meta">
                                        <a>Decoration, Exclusive, Office</a>
                                    </div>
                                    <div class="description">
                                        <div class="ui top right attached label blue">NEW</div>
                                        $15.0 -  $35.0
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                    Joined in 2014
                                    </span>
                                    <div class="right floated meta">14h</div>
                                    <img class="ui avatar image" src="{{ asset('images/demo/elliot.jpg') }}"> Elliot
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($news->count())
                <div class="ui grid">

                    <h4 class="ui horizontal divider header">
                        <i class="tag icon"></i>
                        News
                    </h4>

                    <div  id="carousel-news" class="owl-carousel owl-theme">
                        @foreach($news as $new)
                            <div  class="ui cards">
                                <div class="card product">
                                    <div class="image attachment">
                                        <img class="product-image" src="{{ $new->images[0]->thumbs["400_400"] or null}} " alt="{{$new->name}}">
                                        <div class="mini-icons">
                                            <img class="ui image mini" src="{{ $new->user->getAvatar() }}">
                                            <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
                                            <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
                                        </div>

                                        <div class="mini-attachments">
                                            @foreach($new->images->slice(0, 5) as $image)
                                                <img src="{{ $image->thumbs["400_400"] }}" class="ui mini image" alt="{{$new->name}}">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route("products.show", $new->id) }}" class="header">{{$new->name}}</a>
                                        <div class="meta">
                                            @foreach($new->categories->slice(0, 5) as $category)
                                                <a>{{ $category->category_name }}</a>
                                            @endforeach
                                        </div>
                                        <div class="description">
                                            <div class="ui top right attached label blue">NEW</div>
                                            @if($new->sale_price) <strike>${{$new->regular_price}}</strike> @endif  ${{ $new->real_price }}
                                        </div>
                                    </div>
                                    <div class="extra content">
                                    <span class="right floated">
                                    {{$new->updated_at}}
                                    </span>
                                        <img class="ui avatar image" src="{{ $new->vendor->getLogo() }}"> {{$new->vendor->shop_name}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="ui bannerhover">
                    <figure class="effect-sarah banner-long">
                        <img src="{{ asset('images/demo/stockvault-wicker-baskets135350.jpg') }}" alt="img12">
                        <figcaption>
                            <div>
                                <h2>Nice <span>Lily</span></h2>
                                <p>Lily likes to play with crayons and pencils</p>
                            </div>
                            <a href="#">View more</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="vendors-slider-bg">
        <div class="ui container">
            <div class="ui stackable grid">
                <div class="sixteen wide column">
                    <ul id="vendors-slider" class="owl-carousel owl-theme">
                        <li>
                            <div><img src="{{asset('images/demo/logo-1-1.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-2.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-3.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-4.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-5.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-6.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-1-1.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                        <li>
                            <div><img src="{{asset('images/demo/logo-2.png')}}" alt="Super Vendor Shop">
                                <a href="{{route('home')}}" class="button">Visit Shop</a>
                            </div>
                            <h4 class="ui center aligned header">Super Vendor Shop</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection