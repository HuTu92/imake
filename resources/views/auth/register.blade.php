@extends('layouts.layout')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="column">
                <div class="ui mini breadcrumb">
                    <a class="section">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">Sign up</a>
                </div>
            </div>
        </div>
        <div class="ui stackable  grid">
            <div class="row">
                <div class="four wide column">
                </div>
                <div class="eight wide column">
                    <h4 class="ui horizontal divider header">
                        <i class="add user icon"></i>
                        Sign up
                    </h4>
                    @if ($errors->all())
                        <div class="ui error message">
                            <ul class="list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="register-form" class="ui form error" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                            <label>Your email</label>
                            <div class="ui left icon input">
                                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                <i class="mail outline icon"></i>
                            </div>
                        </div>

                        <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                            <label>First name</label>
                            <div class="ui left icon input">
                                <input id="name" type="text" placeholder="First name" name="name" value="{{ old('name') }}" required autofocus>
                                <i class="user outline icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Last name</label>
                            <div class="ui left icon input">
                                <input placeholder="Last name" type="text" name="last_name" value="{{ old('last_name') }}" required >
                                <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                            <label>Your password</label>
                            <div class="ui left icon input">
                                <input id="password" type="password" placeholder="Password" name="password" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Your password again</label>
                            <div class="ui left icon input">
                                <input id="password-confirm" type="password" placeholder="Password" name="password_confirmation" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input tabindex="0" class="hidden" type="checkbox" required>
                                <label>I agree to the Terms and Conditions</label>
                            </div>
                        </div>

                        <button class="ui  button primary center-block">
                            <i class="add icon user"></i>
                            Sign up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {

        })
    </script>
@endsection
@section('footer')
    @parent
@endsection