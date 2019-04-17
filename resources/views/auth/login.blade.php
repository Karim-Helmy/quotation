@extends('layouts.main')
@section('content')
<div class="bg_color_2">
    <div class="container margin_60_35">
        <div id="login">
            <h1>Please login to Create Quotation!</h1>
            <div class="box_form">
                @if (Session::has('status') && Session::get('status') == 'update')
                <h5 id="relogin">
                    Password Updated Successfully Please Relogin Again
                </h5>
                @endif
                <form method="POST" action="{{ action('Auth\LoginController@login') }}">
                    @csrf
                    <div class="form-group">
                        @include('errors.singleError', ['error_name' => 'email'])
                        <input type="email" name="email" class="form-control" placeholder="Your email address">
                    </div>
                    <div class="form-group">
                        @include('errors.singleError', ['error_name' => 'password'])
                        <input type="password" name="password" class="form-control" placeholder="Your password">
                    </div>
                    <a href="#0"><small>Forgot password?</small></a>
                    <div class="form-group text-center add_top_20">
                        <input class="btn_1 medium" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <p class="text-center link_bright">Do not have an account yet?
                <a href="{{ route('register') }}"><strong>Register now!</strong></a>
            </p>
        </div>
        <!-- /login -->
    </div>
</div>
@endsection
