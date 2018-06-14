@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fileuploader.css')}}">
    <script src="{{asset('js/jquery.fileuploader.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('input[name="avatar"]').fileuploader({
                limit: 1,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                files:[{
                    name: 'Avatar',
                    size: 1024,
                    type: 'image/jpg',
                    file: '<?php echo $user->getAvatar();?>'
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
                </div>
            </div>
        </div>
        <div class="ui stackable grid">

            <div class="column sidebar">
                <img class="ui small circular image centered" src="{{ $user->getAvatar() }}">
                <h4 class="ui center aligned icon header">{{ $user->name }} {{ $user->last_name }}</h4>
                @include('inc.account-sidebar', ['active' => 'account'])
            </div>

            <div class="page-conent column">
                @if (session()->has('message'))
                    <div class="ui info message">
                        <ul class="list">
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                @endif

                <form class="ui form error" enctype="multipart/form-data" id="update-account-form" method="POST" action="{{ route('auth.account') }}">
                    @if ($errors->all())
                        <div class="ui error message">
                            <ul class="list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label>First Name</label>
                        <div class="ui left icon input">
                            <input placeholder="First name" type="text" value="{{ $user->name }}" name="name" required>
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field {{ $errors->has('last_name') ? 'error' : '' }}">
                        <label>Last Name</label>
                        <div class="ui left icon input">
                            <input placeholder="Last name" type="text" value="{{ $user->last_name }}" name="last_name" required>
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>Email</label>
                        <div class="ui left icon input">
                            <input placeholder="Email" type="email" value="{{ $user->email }}" name="email" required disabled="disabled">
                            <i class="mail outline icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>Vendor</label>
                        <div class="ui checkbox">
                            <input name="is_vendor" type="checkbox" value="1" @if( $user->is_vendor ) checked="checked" @endif>
                            <label>I m a vendor </label>
                        </div>
                    </div>
                    <div class="field {{ $errors->has('avatar') ? 'error' : '' }}">
                        <label>file</label>
                        <div class="ui left icon input">
                            <input placeholder="logo" type="file" value="" name="avatar" >
                        </div>
                    </div>

                    <div class="field">
                        <label>New password</label>
                        <div class="ui left icon input">
                            <input placeholder="Password" type="password" name="password">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>New password again</label>
                        <div class="ui left icon input">
                            <input placeholder="Password" type="password" name="password_confirmation">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <button class="ui button primary" type="submit"><i class="save icon"></i> Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection