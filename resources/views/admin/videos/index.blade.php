@extends('layouts.admin.main')
@section('content')
<div class="row">
    <div class="col-12 text-right">
        <a href="{{ route('videos.create') }}" class="btn btn-primary">
            Add New Video
        </a>
    </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>
            Video
        </th>
        <th>
            Category
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
        @foreach ($videos as $video)
            <tr>
                <td>
                    @if ($video->status === 'file')
                    <video width="320" height="150" controls>
                        <source src="/assets/videos/{{ $video->video }}" type="video/mp4">
                        <source src="/assets/videos/{{ $video->video }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    @else
                    <iframe width="320" height="150" src="{{ $video->video }}">
                    </iframe>
                    @endif
                </td>
                <td>
                    @foreach ($video->getCategory as $category)
                        {{ $category->category }}
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-primary">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-button">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
