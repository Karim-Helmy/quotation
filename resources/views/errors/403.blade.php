@extends('layouts.main')
@section('content')
<div id="error_page">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-lg-9">
                <h2>403 <i class="icon_error-triangle_alt"></i></h2>
                <p>Sorry, you are not authorized to pass into this page .</p>
                <h3>
                    <a href="/">
                        Go Home
                    </a>
                </h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection
