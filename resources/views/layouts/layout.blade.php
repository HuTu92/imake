@include('inc.head')
@include('inc.topbar')
@yield('content')
@include('inc.footer')
@if(Auth::check())
    @include('inc.sidebar')
@endif
@include('inc.enddocument')