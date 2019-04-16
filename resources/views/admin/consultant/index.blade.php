@extends('layouts.admin.main')
@section('content')
<div class="box_general">
    <div class="list_general">
        <ul>
            @foreach ($consultants as $consultant)
            <li>
                <span title="{{ $consultant->created_at->toDateTimeString() }}">{{ $consultant->created_at->diffForHumans() }}</span>
                <figure><img src="/images/consultants/{{ $consultant->get_images->first()->images }}"></figure>
                <h4>{{ $consultant->firstname_booking }} {{ $consultant->lastname_booking }}
                    <i class="{{ ($consultant->status == 0) ? 'unread' : 'read' }}">{{ ($consultant->status === 0) ? 'Un Seen' : 'Assigned' }}</i>

                    <i class="{{ (count($consultant->doctor_replay)) ? 'read' : 'unread' }}">{{ (count($consultant->doctor_replay)) ? 'Solved' : ' Un Solved ' }}</i></h4>
                <p>
                    {{ str_limit($consultant->message, 150) }}
                </p>
                <div class="text-right">
                    <a href="{{ route('admin.consultant.show', $consultant->id) }}" class="btn btn-primary">
                        More
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /box_general-->
@endsection
