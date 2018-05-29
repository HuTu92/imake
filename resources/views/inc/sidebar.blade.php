@section('sidebar')

    <div class="cart-sidebar">
        <div class="ui sidebar vertical menu right">
            <?php
	        $total = 0;
            ?>
            @foreach($user->carts as $item)
                <?php
                    ;
                    $total = $total + $item->product->real_price * $item->count?>
                <div class="item">
                    <div class="ui middle aligned divided list">
                        <div class="item">
                            <img class="ui tiny image" src="{{ imake\Image::getThumb($item->product->images[0]->file, [100,100]) }}">
                            <div class="content">
                                <a class="header">{{ $item->product->name }}</a>
                                <div class="description"> <span>{{ $item->count }} x {{ $item->product->currency }} {{ $item->product->real_price }}</span> </div>
                            </div>
                            <div class="right floated content">
                                <i class="remove icon red"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="cart-total">
                <div class="item">
                    <span class="ui blue header cart-total">Total: ${{ $total }} </span>
                </div>
                <div class="item">
                    <a href="{{route('cart')}}"  class="ui basic button fluid blue">
                        <i class="icon shopping bag"></i>
                        View Cart
                    </a>
                    <a class="ui basic button fluid green">
                        <i class="icon check"></i>
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
@show