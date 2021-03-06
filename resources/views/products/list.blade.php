@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Products</a>
                </div>
            </div>
        </div>
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
                <div  class="ui cards">
                    @foreach($products as $product)
                        @include("inc.products-list", ["product" => $product])
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection