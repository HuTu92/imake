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
                    @foreach($messages as $msg)
                        @php
                        if($msg->user_id == $chat->user_id){
                            $author = $chat->user->name . " " . $chat->user->last_name;
                            $avatar = $chat->user->getAvatar();
                            $link = "#";
                        }else{
                            $author = $chat->vendor->shop_name ?: $chat->vendor->user->name . " " . $chat->vendor->user->last_name;
                            $avatar = $chat->vendor->getLogo();
                            $link = route("vendors.show", $chat->vendor->id);
                        }
                        @endphp
                        <div class="comment">
                            <a class="avatar" href="{{$link}}">
                                <img src="{{$avatar}}">
                            </a>
                            <div class="content">
                                <a class="author" href="{{$link}}">{{$author}}</a>
                                <div class="metadata">
                                    <div class="date">{{$msg->updated_at}}</div>
                                </div>
                                <div class="text">
                                    {{$msg->message}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{--TODO new message from chat--}}
                    <form class="ui reply form">
                        <div class="field">
                            <textarea></textarea>
                        </div>
                        <div class="ui primary submit labeled icon button">
                            <i class="icon edit"></i> Add Comment
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
@section('footer')
    @parent
@endsection