@extends('layouts.main')
@section('content')
@include('includes.breadcrumbs')
<div class="container mt-5">
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-lg-4 col-xs-12 box_feat">
            @if ($video->status == 'file')
            <video width="100%" height="100%" controls>
                <source src="/assets/videos/{{ $video->video }}" type="video/mp4">
                <source src="/assets/videos/{{ $video->video }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @elseif($video->status == 'url')
            <iframe width="100%" height="100%" src="{{ $video->video }}">
            </iframe>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection
