@extends('layouts.main')

@section('content')
<div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="register">
                <h1>Please register to Create Quotation!</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form method="POST" action="{{ action('Auth\RegisterController@register') }}">
                            @csrf
                            <div class="box_form">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="name" class="form-control" placeholder="Your name">
                                    @include('errors.singleError', ['error_name' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Your email address">
                                    @include('errors.singleError', ['error_name' => 'email'])
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" id="password1" placeholder="Your password">
                                    @include('errors.singleError', ['error_name' => 'password'])
                                </div>

                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password2" placeholder="Confirm password">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number">
                                    @include('errors.SingleError', ['error_name' => 'phone'])
                                </div>



                                <div id="pass-info" class="clearfix"></div>
                                <div class="checkbox-holder text-left">
                                    <div class="checkbox_2">
                                        <input type="checkbox" value="accept_2" id="check" name="check">
                                        <label for="check"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                                    </div>
                                </div>
                                @include('errors.singleError', ['error_name' => 'check'])
                                <div class="form-group text-center add_top_30">
                                    <input class="btn_1" type="submit" value="Submit">
                                </div>
                            </div>
                            <p class="text-center"><small>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</small></p>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /register -->
        </div>
    </div>
@endsection
