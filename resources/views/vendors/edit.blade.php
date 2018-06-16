@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fileuploader.css')}}">
    <script src="{{asset('js/jquery.fileuploader.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        <?php $images = json_decode(old("fileuploader-list-images"));?>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[name="logo"]').fileuploader({
                limit: 1,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                // by default - false,
                files:[{
                    name: 'Avatar',
                    size: 1024,
                    type: 'image/jpg',
                    file: '<?php echo  $user->vendor->getLogo();?>'
                }]
            });

        })
    </script>

    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Account</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Shop settings</a>
                </div>
            </div>
        </div>
        <div class="ui stackable grid">

            <div class="column sidebar">
                @include('inc.account-sidebar', ['active' => 'shop.settings'])
            </div>

            <div class="page-conent column">
                @if (session()->has('message'))
                    <div class="ui info message">
                        <ul class="list">
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                @endif
                @if ($errors->all())
                    <div class="ui error message">
                        <ul class="list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="ui top attached tabular menu tabs">
                    <a class="active item" data-tab="general"><i class="setting icon"></i> General</a>
                    <a class="item" data-tab="delivery"><i class="truck icon"></i> Delivery</a>
                    <a class="item" data-tab="payments"><i class="payment icon"></i> Payments</a>
                    <a class="item" data-tab="style"><i class="paint brush icon"></i> Shop style</a>
                </div>
                <div class="ui bottom attached active tab segment" data-tab="general">
                    <form class="ui form error"  enctype="multipart/form-data" method="POST" action="{{ route('vendors.update', $id) }}">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="field {{ $errors->has('shop_name') ? 'error' : '' }}">
                            <label>Shop name</label>
                            <div class="ui left icon input">
                                <input placeholder="Shop name" type="text" name="shop_name" value="{{ old("shop_name") ?: $user->vendor->shop_name }}" required>
                                <i class="shopping bag icon"></i>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('shop_description') ? 'error' : '' }}">
                            <label>Shop description</label>
                            <div class="ui left icon input">
                                <textarea placeholder="Shop description" name="shop_description" >{{ old("shop_description") ?: $user->vendor->shop_description }}</textarea>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('shop_country') ? 'error' : '' }}">
                            <label>Shop Country</label>
                            <div class="ui left icon input">
                                <div class="ui fluid search selection dropdown">
                                    <input name="shop_country" type="hidden" value="{{ $user->vendor->shop_country }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Select Country</div>
                                    <div class="menu">
                                        @foreach($countries as $country)
                                            <div class="item" data-value="{{$country->name->common}}"><i class="{{ strtolower($country["cca2"]) }} flag"></i>{{$country->name->common}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('avatar') ? 'error' : '' }}">
                            <label>Shop logo</label>
                            <div class="ui left icon input">
                                <input placeholder="logo" type="file" value="" name="logo" >
                            </div>
                        </div>

                        <button class="ui button primary" type="submit"><i class="save icon"></i> Save shop settings</button>
                    </form>
                </div>
                <div class="ui bottom attached tab segment" data-tab="delivery">
                    <form class="ui form" method="post" action="javascript:void(0);">

                        <div class="field {{ $errors->has('shop_country') ? 'error' : '' }}">
                            <label>Delivery Countries</label>
                            <div class="ui left icon input">
                                <div class="ui fluid search selection dropdown multiple">
                                    <input name="shop_country" type="hidden" value="{{ $user->vendor->shop_country }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Select Country</div>
                                    <div class="menu">
                                        @foreach($countries as $country)
                                            <div class="item" data-value="{{$country->name->common}}"><i class="{{ strtolower($country["cca2"]) }} flag"></i>{{$country->name->common}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button class="ui button primary" type="submit"><i class="save icon"></i> Save payment settings</button>
                    </form>

                </div>
                <div class="ui bottom attached tab segment" data-tab="payments">
                    <form class="ui form" method="post" action="javascript:void(0);">
                        <div class="field">
                            <label>Payments types</label>
                            <div class="ui toggle checkbox">
                                <input tabindex="0" class="hidden" type="checkbox"  name="visa-master" id="visa-master">
                                <label>VISA/MASTER </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui toggle checkbox">
                                <input tabindex="0" class="hidden" type="checkbox"  name="arca" id="arca">
                                <label>ARCA Armenian</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui toggle checkbox">
                                <input tabindex="0" class="hidden" type="checkbox"  name="idram" id="idram">
                                <label>iDram </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui toggle checkbox">
                                <input tabindex="0" class="hidden" type="checkbox" name="paypal" id="paypal" checked>
                                <label>PayPal </label>
                            </div>
                        </div>
                        <div class="field pay-type visa-master" style="display: none">
                            <label>VISA/MASTER</label>
                            <div class="ui left icon input">
                                <input placeholder="Bank" type="text">
                                <i class="university icon"></i>
                            </div>
                        </div>
                        <div class="field pay-type visa-master" style="display: none">
                            <div class="ui left icon input">
                                <input placeholder="Cad number" type="text">
                                <i class="payment icon"></i>
                            </div>
                        </div>

                        <div class="field pay-type arca" style="display: none">
                            <label>ARCA Armenian</label>
                            <div class="ui left icon input">
                                <input placeholder="Bank" type="text">
                                <i class="university icon"></i>
                            </div>
                        </div>
                        <div class="field pay-type arca" style="display: none">
                            <div class="ui left icon input">
                                <input placeholder="Cad number" type="text">
                                <i class="payment icon"></i>
                            </div>
                        </div>
                        <div class="field pay-type idram" style="display: none">
                            <label>iDram</label>
                            <div class="ui left icon input">
                                <input placeholder="iDram ID" type="text">
                                <i class="hashtag icon"></i>
                            </div>
                        </div>
                        <div class="field pay-type paypal">
                            <label>PayPal</label>
                            <div class="ui left icon input">
                                <input placeholder="PayPal Email" type="text">
                                <i class="paypal icon"></i>
                            </div>
                        </div>

                        <button class="ui button primary" type="submit"><i class="save icon"></i> Save payment settings</button>
                    </form>

                </div>
                <div class="ui bottom attached tab segment" data-tab="style">
                    <form>
                        <div class="ui form">
                            <div class="inline fields">
                                <label>Select shop style</label>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input name="style" checked="checked" type="radio">
                                        <label>First style</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input name="style" type="radio">
                                        <label>Second style</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input name="style" type="radio">
                                        <label>Once a day</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input name="style" type="radio">
                                        <label>Twice a day</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="ui button primary" type="submit"><i class="save icon"></i> Save shop style settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.ui.checkbox').checkbox({
                onIndeterminate: function () {
                    alert('onEnable');
                },
                onChecked: function () {
                    var value = $(this).attr('id');
                    $('.pay-type.'+value).show();
                },
                onUnchecked: function () {
                    var value = $(this).attr('id')
                    $('.pay-type.'+value).hide();

                }
            });
        })
    </script>
@endsection

@section('footer')
    @parent
@endsection