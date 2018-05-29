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
                <div class="masthead error segment">
                    <div class="container">
                        <h1 class="ui dividing header">
                            <i class="warning sign icon"></i> Page not found
                        </h1>
                        <p style="font-size: 200px; text-align: center">404</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection