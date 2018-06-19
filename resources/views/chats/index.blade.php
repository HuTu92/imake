@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Chat</a>
                </div>
            </div>
        </div>
        <div class="ui stackable grid">
            <div class="column sidebar">
                @include("inc.account-sidebar", ["active" => "account"])
            </div>

            <div class="page-conent column">
                <div class="ui comments">
                    <div class="ui items">
                        @foreach($chats as $chat)
                            @php
                                if(empty($chat->messages->last())){
                                    continue;
                                }

                                if($chat->user_id == $chat->messages->last()->user_id){
                                    $author = $chat->user->name . " " . $chat->user->last_name;
                                    $avatar = $chat->user->getAvatar();
                                    $link = "#";
                                }else{
                                    $author = $chat->vendor->shop_name ?: $chat->vendor->user->name . " " . $chat->vendor->user->last_name;
                                    $avatar = $chat->vendor->getLogo();
                                    $link = route("vendors.show", $chat->vendor->id);
                                }

                            @endphp
                            <div class="item comment">
                                <div class="ui tiny image">
                                    <a href="{{route("chats.show", $chat->id)}}"><img src="{{\imake\Image::getThumb($chat->product->getGeneralImage(), [400,400])}}"></a>
                                </div>
                                <div class="content">
                                    <div class="header"><a href="{{route("chats.show", $chat->id)}}">{{$chat->product->name}}</a></div>
                                    <div class="description">
                                        <p>{{$chat->messages->last()->message or ""}}</p>
                                    </div>
                                    <a class="ui image label chat-label" href="{{route("chats.show", $chat->id)
                                    }}">
                                        <img src="{{$avatar}}">
                                        {{$author . " - " .$chat->messages->last()->updated_at}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{ $chats->links() }}

            </div>

        </div>

    </div>

@endsection
@section('footer')
    @parent
@endsection