@extends('layouts.admin.main')

@section('content')

<form method="POST" action="{{ route('languages_store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group row">
        <label for="language_name" class="col-sm-2 col-form-label">Language</label>
        <div class="col-sm-10">
            <input
            type="text"
            name="language_name"
            class="form-control"
            id="language_name"
            placeholder="Enter Language Name"
            required>
        </div>
    </div>

    <div class="form-group row">
        <label for="prefix" class="col-sm-2 col-form-label">Language Prefix</label>
        <div class="col-sm-10">
            <input
            type="text"
            name="prefix"
            class="form-control"
            id="prefix"
            placeholder="Enter Language Prefix /ar /en"
            required>
        </div>
    </div>


    <div class="form-group row">
        <label for="direction" class="col-sm-2 col-form-label">Direction</label>
        <div class="col-sm-10" id="direction">
            <select class="custom-select mr-sm-2" id="direction" name="direction" required>
                <option disabled selected >Choose Direction</option>
                <option value="rtl">Right To Left</option>
                <option value="ltr">Left To Right</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="language_favicon" class="col-sm-2 col-form-label">Language FAVICON</label>
        <div class="col-sm-10">
            <input
            type="file"
            name="language_favicon"
            id="language_favicon"
            required>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>

</form>
@endsection
