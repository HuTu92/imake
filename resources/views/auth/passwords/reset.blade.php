@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Reset Password</a>
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
                        Reset Password
                    </h4>
                    @if (session('status'))
                        <div class="ui ignored info message">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ( $errors->all())
                        <div class="ui error message">
                            <ul class="list">
                                @if ($errors->has('email'))
                                    <li>{{ $errors->first('email') }}</li>
                                @endif
                                @if ($errors->has('password'))
                                    <li>{{ $errors->first('password') }}</li>
                                @endif
                                @if ($errors->has('password_confirmation'))
                                    <li>{{ $errors->first('password_confirmation') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <form id="reset-password" class="ui form error" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                            <label>E-Mail Address</label>
                            <div class="ui left icon input">
                                <input id="email" type="email" placeholder="Email" name="email" value="{{ $email or old('email') }}" required autofocus>
                                <i class="mail outline icon"></i>
                            </div>
                        </div>

                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <label>Password</label>
                            <div class="ui left icon input">
                                <input id="password" type="password" placeholder="Password"  name="password" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>

                        <div class="field {{ $errors->has('password_confirmation') ? ' error' : '' }}">
                            <label>Confirm Password</label>
                            <div class="ui left icon input">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>

                        <button class="ui  button primary center-block">
                            <i class="icon lock"></i>
                            Reset Password
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
