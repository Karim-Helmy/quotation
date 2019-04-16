@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('values.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group row">
        <label for="key_id" class="col-sm-2 col-form-label">Select Label</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" name="key_id" id="key_id">
                <option disabled selected>Select Label</option>
                @foreach ($labels as $label)
                <option value="{{ $label->id }}">{{ $label->key }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="language" class="col-sm-2 col-form-label">Select Language</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" name="language" id="language">
                <option disabled selected>Select Language</option>
                @foreach ($languages as $language)
                <option value="{{ $language->id }}">{{ ucfirst($language->language) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="value" class="col-sm-2 col-form-label">Value</label>
        <div class="col-sm-10">
            <input type="text" name="value" class="form-control" id="value" placeholder="Value" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>

</form>
@endsection
