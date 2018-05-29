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
                    @if ( $errors->first('email'))
                        <div class="ui error message">
                            <ul class="list">
                                @if ($errors->has('email'))
                                    <li>{{ $errors->first('email') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    <form id="reset-password" class="ui form error" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                            <label>Your email</label>
                            <div class="ui left icon input">
                                <i class="mail outline icon"></i>
                                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        <button class="ui  button primary center-block">
                            <i class="icon envelope"></i>
                            Send Password Reset Link
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