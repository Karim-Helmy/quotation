@extends('layouts.main')
@section('content')
    @include('includes.breadcrumbs')

<div class="container margin_60">
    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <div class="box_general_3 cart">
                <dl class="row">
                    <dt class="col-sm-3">Date:</dt>
                    <dd class="col-sm-9">
                        <p>{{ $consultant->created_at->diffForHumans() }} | {{ $consultant->created_at }}.</p>
                    </dd>

                    <dt class="col-sm-3">Lastname: </dt>
                    <dd class="col-sm-9">
                        <p>{{ $consultant->firstname_booking }}.</p>
                    </dd>

                    <dt class="col-sm-3">Firstname: </dt>
                    <dd class="col-sm-9">
                        <p>{{ $consultant->lastname_booking }}.</p>
                    </dd>

                    <dt class="col-sm-3">Message: </dt>
                    <dd class="col-sm-9">
                        <p>{{ $consultant->message }}. </p>
                    </dd>

                    <dt class="col-sm-3">Images: </dt>
                    <dd class="col-sm-9">
                        @foreach ($consultant->get_images as $image)
                        <a href="/assets/images/consultants/{{ $image->images }}" target="_blank">
                            <img src="/assets/images/consultants/{{ $image->images }}" style="height: 150px;width: 150px;margin: 5px;">
                        </a> @endforeach
                    </dd>


                </dl>

            </div>
        </div>
        <aside class="col-xl-4 col-lg-4" id="sidebar">
            <div class="box_general_3 booking">

                @include('errors.singleError', ['error_name' => 'replay'])
                @if ($consultant->doctor_replay->contains(Auth::user()->id))

                <p class="btn btn-success">
                    You Already Replyed On This Consultan
                </p>
                <p>
                    {{ $consultant->doctor_replay->first()->pivot->replay }}
                </p>

                @else
                <form action="{{ route('replay.consultant', $consultant->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="replay">
                            Replay
                        </label>
                        <textarea name="replay" id="replay" class="form-control" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success form-control">
                            Send Replay
                        </button>
                    </div>
                </form>
                @endif

            </div>
        </aside>
    </div>
</div>
@endsection
