@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Sign in</a>
                </div>
            </div>
        </div>
        <div class="ui stackable  grid">
            <div class="row">
                <div class="four wide column">
                </div>
                <div class="eight wide column">
                    <h4 class="ui horizontal divider header">
                        <i class="user icon"></i>
                        Sign in
                    </h4>
                    @if (session('activationStatus'))
                        <div class="ui info message">
                            <ul class="list">
                                <li>{{ Lang::get('auth.activationStatus') }}</li>
                            </ul>
                        </div>
                    @endif
                    @if (session('activationWarning'))
                        <div class="ui error message">
                            <ul class="list">
                                <li>{{ Lang::get('auth.activationWarning') }}</li>
                            </ul>
                        </div>
                    @endif
                    @if ($errors->all())
                        <div class="ui error message">
                            <ul class="list">
                                @if ($errors->has('email'))
                                    <li>{{ $errors->first('email') }}</li>
                                @endif
                                @if ($errors->has('password'))
                                    <li>{{ $errors->first('password') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    <form id="login-form" class="ui form error" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                            <label>Your email</label>
                            <div class="ui left icon input">
                                <i class="mail outline icon"></i>
                                <input id="email" type="email" placeholder="Email" name="email"
                                       value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label>Your password</label>
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input id="password" type="password" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input tabindex="0" class="hidden" type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label>Remember Me</label>
                            </div>
                        </div>
                        <button class="ui  button primary center-block">
                            <i class="icon user"></i>
                            Sign in
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </form>

                    <div class="social-login">
                        <h4 class="ui horizontal divider header">
                            <i class="users icon"></i>
                            Social Sign in
                        </h4>

                        <button class="ui facebook button ">
                            <i class="facebook icon"></i>
                            Facebook
                        </button>
                        <button class="ui google plus button">
                            <i class="google plus icon"></i>
                            Google Plus
                        </button>
                        <button class="ui vk button">
                            <i class="vk icon"></i>
                            VK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection