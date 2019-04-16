@extends('layouts.main')
@section('content')

<div class="container margin_120_95">
    <div class="main_title">
        <h2>Find by specialization</h2>
        <p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet cetero
            at.
        </p>
    </div>

    <div class="row">
        @foreach ($diseasesCategories as $diseasesCategory)
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('videos.category', $diseasesCategory->prefix) }}" class="box_cat_home">
                <i class="icon-info-4"></i>
                <img src="/assets/img/icon_cat_1.svg" width="60" height="60" alt="">
                <h3>{{ ucwords($diseasesCategory->category) }}</h3>
                <ul class="clearfix">
                    <li><strong>{{ count($diseasesCategory->getVidoes) }}</strong>Video</li>
                </ul>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
