<div class="ui vertical menu">
    <a href="{{route('account')}}" class="@if($active == 'account') active @endif item">
        <i class="user icon"></i> Account
    </a>
    <a class="item">
        <i class="options icon"></i> Settings
    </a>
    <a class="item" href="{{route("chats.index")}}">
        <i class="comments icon"></i> My Messages
        @php
            $cnt = 0;
            $user_id = \Illuminate\Support\Facades\Auth::user()->id;
            if($chats =   \imake\Chat::where('user_id', $user_id)->orWhere('vendor_id', $user_id)->get())
            {
                foreach ($chats as $chat)
                {
                    $not_my = $chat->messages->whereNotIn('user_id', $user_id);
                    $not_read = $not_my->where('is_read', 0)->count();
                    if($not_read){
                    $cnt += $not_read;
                    };
                }
            };
        @endphp
        @if($cnt > 0)
            <div class="floating ui red label">{{ $cnt }}</div>
        @endif
    </a>
    @if( $user->is_vendor )
        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Vendor
            <div class="menu">
                <a class="item"><i class="dashboard icon"></i> Dashboard </a>
                <a class="@if($active == 'shop.settings') active @endif item" href="{{route('vendors.edit', $user->vendor->id)}}"><i class="options icon"></i> Shop settings </a>
                <a class="item"><i class="bar chart icon"></i> Statistic</a>
                <a class="item"><i class="payment icon"></i> Sells</a>
            </div>
        </div>
    @endif
</div>
@if( $user->is_vendor )
<div class="ui vertical menu">

    <a href="{{route('products.my')}}" class="@if($active == 'my-products') active @endif item">
        <i class="idea icon"></i> My products
    </a>
    <a href="{{route('products.create')}}"class="@if($active == 'create-product') active @endif item">
        <i class="options icon"></i> New product
    </a>

</div>
@endif