@extends('layouts.admin.main')

@section('content')

<form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group row" id="urlVideo">
        <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
        <div class="col-sm-10">
            <input
            type="text"
            name="video_url"
            class="form-control"
            id="video_url"
            placeholder="https://www.youtube.com/watch?v=xxxxx"
            >
        </div>
    </div>

    <div class="form-group row" style="display: none;" id="localVideo">
        <label for="video_file" class="col-sm-2 col-form-label">Upload Video</label>
        <div class="col-sm-10">
            <input
            type="file"
            name="video_file"
            id="video_file"
            >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 offset-sm-2">
            <button class="btn btn-success" onclick="showUploadForm()" type="button">
                Other Option
            </button>
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Choose Category</label>
        <div class="col-sm-10">
            <select
                class="custom-select mr-sm-2"
                id="category"
                name="category"
                required
                onchange="selectCategoryDiseas(this)"
            >
                <option disabled selected > Select Category </option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ ucfirst($category->category) }}</option>
                @endforeach

            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>

</form>
@endsection

@section('customJs')
    <script>
        const showUploadForm = ()=>{
            $("#localVideo").fadeToggle('fast');
            $("#urlVideo").fadeToggle('fast');
        }
    </script>
@endsection
