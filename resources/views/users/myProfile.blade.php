@extends('layouts.main')
@section('content')
<div class="container margin_60">
    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <nav id="secondary_nav">
                <div class="container">
                    <ul class="clearfix">
                        <li><a href="#section_1" class="active">General info</a></li>
                        <li><a href="#section_2">Reviews</a></li>
                        <li><a href="#sidebar">Booking</a></li>
                    </ul>
                </div>
            </nav>
            <div id="section_1">
                <div class="box_general_3">
                    <div class="profile">
                        <div class="row">
                            <div class="col-lg-5 col-md-4">
                                <figure>
                                    <img src="http://via.placeholder.com/565x565.jpg" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <small>{{ Auth::user()->level }}</small>
                                <h1>{{ ucfirst(Auth::user()->name) }}</h1>
                                <span class="rating">

                                    <i class="icon_star voted"></i>
                                    <i class="icon_star"></i>
                                    <small>({{ intval(Auth::user()->userAverageRating) }})</small>
                                    <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
                                </span>
                                <ul class="statistic">
                                    <li>854 Views</li>
                                    <li>124 Patients</li>
                                </ul>
                                <ul class="contacts">
                                    <li>
                                        <h6>Mail</h6>
                                        {{ ucfirst(Auth::user()->email) }}
                                        <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361"
                                            target="_blank"> <strong> View on map</strong></a>
                                    </li>
                                    <li>
                                        <h6>Phone</h6> <a href="tel://{{ Auth::user()->phone }}">{{ Auth::user()->phone }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr>






        <!-- /asdide -->
    </div>
    <!-- /row -->
</div>
@endsection
