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

                    <form class="ui reply form" method="post" action="{{ route('messages.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name='chat_id' value="{{ $chat->id }}">
                        <div class="field">
                            <textarea name='message' required></textarea>
                        </div>
                        <button class="ui blue labeled submit icon button">
                            <i class="icon edit"></i> Send Message
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
@section('footer')
    @parent
@endsection