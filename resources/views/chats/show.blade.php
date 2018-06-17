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
            <div class="page-conent column">

                <?
               // dump($chat->messages);
                ?>

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