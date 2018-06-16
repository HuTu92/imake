<div class="card product">
    <div class="image attachment">
        <img class="product-image" src="{{  \imake\Image::getThumb($product->getGeneralImage(), [400,400]) }}">
        <div class="mini-icons">
            <img class="ui image mini" src="{{ $product->user->getAvatar() }}">
            <div class="add-bookmark popup right-center" data-content="Add to bookmark" data-variation="inverted"><i class="icon heart"></i></div>
            <div class="add-bookmark popup right-center" data-content="Compare" data-variation="inverted"><i class="sort content ascending icon"></i></div>
        </div>
        <div class="mini-attachments">
            @foreach($product->images->slice(0, 5) as $product_image)
                <img src="{{ $product_image->thumbs["400_400"] }}" class="ui mini image">
            @endforeach
        </div>
    </div>
    <div class="content">
        <a href="/products/{{$product->id}}" class="header">{{$product->name}}</a>
        <div class="meta">
            @foreach($product->categories->slice(0, 5) as $category)
                <a>{{ $category->category_name }}</a>
            @endforeach
        </div>
        <div class="description">
            {{--<div class="ui top right attached label blue">NEW</div>--}}
            @if($product->sale_price) <strike>${{$product->regular_price}}</strike> @endif  ${{ $product->real_price }}
        </div>
    </div>
    <div class="extra content">
        <a href="{{route("vendors.show", $product->vendor->id)}}"><img class="ui avatar image" src="{{ $product->vendor->getLogo() }}"> {{$product->vendor->shop_name}}</a>
    </div>
</div>
