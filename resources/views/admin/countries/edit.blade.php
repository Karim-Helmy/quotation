@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('countries.update', $country->id) }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    @method('PATCH')

    <input type="hidden" name="oldImage" value="{{ $country->logo }}">

    <div class="form-group row">
        <label for="country_name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                name="country_name"
                class="form-control"
                id="country_name"
                placeholder="Question"
                value="{{ $country->country_name }}"
                required
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="country_code" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <input
                type="text"
                name="country_code"
                class="form-control"
                id="country_code"
                placeholder="Question"
                value="{{ $country->code }}"
                required
            >
        </div>
    </div>

    <div class="form-group row">
            <label for="country_image" class="col-sm-2 col-form-label">Country Image</label>
            <div class="col-sm-10">
                <input
                    type="file"
                    name="country_image"
                    id="country_image"
                >
                @if ($country->logo)
                <img
                    src="/images/countries/{{ $country->logo }}"
                    height="60px"
                    style="margin: 10px 0px ;display: block"
                >
                @endif
            </div>
        </div>

    <div class="form-group row">
        <label for="main_country" class="col-sm-2 col-form-label">Main Country</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" id="main_country" name="main_country" required>
                <option value="0"
                    {{ ($country->parent === 0) ? 'selected' : '' }}
                >
                    Main Country
                </option>

                @foreach ($allCountries as $Country)

                    <option
                        {{ ($country->id === $Country->id && $country->parent != 0) ? 'selected' : '' }}
                        value="{{ $Country->id }}"
                    >
                        {{ $Country->country_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
@endsection
