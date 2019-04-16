@extends('layouts.admin.main')
@section('content')

<form method="POST" action="{{ route('countries.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group row">
        <label for="country_name" class="col-sm-2 col-form-label">Country Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                name="country_name"
                class="form-control"
                id="country_name"
                placeholder="Enter Country Name"
                required
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="country_code" class="col-sm-2 col-form-label">Country Code</label>
        <div class="col-sm-10">
            <input
                type="text"
                name="country_code"
                class="form-control"
                id="country_code"
                placeholder="Enter Country Code  EG , KSA"
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
        </div>
    </div>

    <div class="form-group row">
        <label for="main_country" class="col-sm-2 col-form-label">Main Country</label>
        <div class="col-sm-10">
            <select
                class="custom-select mr-sm-2"
                id="main_country"
                name="main_country"
            >
                @php
                    $country_id = '';
                    if (isset($_GET['country'])) {
                        $country_id = $_GET['country'];
                    }
                @endphp
                <option selected value="0"> Main Country </option>

                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ ($country_id == $country->id) ? 'selected' : '' }}>{{ ucfirst($country->country_name) }}</option>
                @endforeach

            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>

    </form>


@endsection
