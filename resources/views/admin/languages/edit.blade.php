@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('languages_update', $language->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="form-group row">
            <label for="language_name" class="col-sm-2 col-form-label">Language</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    name="language_name"
                    class="form-control"
                    id="language_name"
                    placeholder="Language Name"
                    required
                    value="{{ $language->language }}"
                >
            </div>
        </div>

        <div class="form-group row">
            <label for="language_prefix" class="col-sm-2 col-form-label">Language Prefix</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    name="language_prefix"
                    class="form-control"
                    id="language_prefix"
                    placeholder="Language Prefix"
                    required
                    value="{{ $language->prefix }}"
                >
            </div>
        </div>

        <div class="form-group row">
            <label for="language_favicon" class="col-sm-2 col-form-label">Language Prefix</label>
            <div class="col-sm-10">
                <input
                    type="file"
                    name="language_favicon"
                    id="language_favicon"
                >
                <img
                    src="/images/languages/{{ $language->favicon }}"
                    height="60px"
                    style="margin: 10px 0px ;display: block"
                >
            </div>
        </div>

        <div class="form-group row">
            <label for="direction" class="col-sm-2 col-form-label">Direction</label>
            <div class="col-sm-10" id="direction">
                <select class="custom-select mr-sm-2" id="direction" name="direction" required>
                    <option disabled selected >Choose Direction</option>
                    <option value="rtl" {{ ($language->direction == 'rtl') ? 'selected' : '' }}>Right To Left</option>
                    <option value="ltr" {{ ($language->direction == 'ltr') ? 'selected' : '' }}>Left To Right</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <input
                type="hidden"
                name="old_image"
                value="{{ $language->favicon }}"
            >

            <input
                type="hidden"
                name="id"
                value="{{ $language->id }}"
            >

            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
</form>
@endsection
