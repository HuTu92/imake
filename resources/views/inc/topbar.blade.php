@section('tobmenu')
<div class="ui top menu mini inverted">
    <div class="ui container">

        <a href="" class="item"><i class="info circle icon"></i>{{Lang::get('strings.About')}}</a>
        <a href="" class="item"><i class="envelope icon"></i>{{Lang::get('strings.Contact Us')}}</a>
        <div class="right menu">
            <div class="ui dropdown item">
                <i class="{{ LaravelLocalization::getSupportedLocales()[LaravelLocalization::getCurrentLocale()]["country"] }} flag"></i>{{__('strings.Language')}} <i class="dropdown icon"></i>
                <div class="menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                         <a class="item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><i class="{{ $properties["country"] }} flag"></i> {{ $properties['native'] }}</a>
                    @endforeach
                </div>
            </div>
            @if (!Auth::check())
                <a href="{{route('login')}}" class="item"><i class="user icon"></i>{{Lang::get('strings.Sign Up')}}</a>
                <a href="{{route('register')}}" class="item"><i class="add user icon"></i>{{Lang::get('strings.Sign In')}}</a>
            @else
                <a href="{{route('account')}}" class="item"><i class="user icon"></i>{{Lang::get('strings.Account')}}</a>
                <a href="{{route('logout')}}" class="item"><i class="remove user icon"></i>{{__('strings.Logout')}}</a>
            @endif

        </div>
    </div>

</div>
@show
@section('logosection')
<div class="logobg">
    <div class="ui main container ">
        <a href="{{route('home')}}">
            <img class="ui middle aligned tiny image" src="{{asset('images/logo.jpg')}}">
        </a>
        <span>Middle Aligned</span>
        @if(Auth::check())
            <div class="ui compact menu pull-right cart-icon">
                <a class="item">
                    <i class="shopping bag icon blue"></i>
                    <div class="floating ui red label">{{ getCartCount() }}</div>
                </a>
            </div>
        @endif
    </div>
</div>
@show
@section('mainmenu')
<div class="ui borderless main menu">
    <div class="ui container">
        <ul class="m-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Vendors</a>
                <ul class="m-menu-first-child">
                    <li><a href="#">Tigran Hovhannisyan</a></li>
                </ul>
            </li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

    </div>
</div>
@show