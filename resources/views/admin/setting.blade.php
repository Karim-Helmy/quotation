@extends('layouts.admin.main')
@section('content')

<form method="POST" action="{{ route('settings_update') }}" enctype="multipart/form-data" novalidate>

    {{ csrf_field() }}

    <div class="form-group row">
        <label for="wesite_name" class="col-sm-2 col-form-label">Website Name</label>
        <div class="col-sm-10">
        <input type="text" name="wesite_name" class="form-control" id="wesite_name" placeholder="Website Name" required value="{{ $setting->sitename}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="webiste_email" class="col-sm-2 col-form-label">Website Email</label>
        <div class="col-sm-10">
        <input type="email" name="webiste_email" class="form-control" id="webiste_email" placeholder="Website Email" required value="{{ $setting->email }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="website_logo" class="col-sm-2 col-form-label">Website Logo</label>
        <div class="col-sm-10">
            <input type="file" name="website_logo" id="website_logo" required>
        <img src="/assets/images/website/{{ $setting->logo }}" style="height: 50px; margin: 10px 0px;display:block">
        </div>
    </div>

    <div class="form-group row">
        <label for="website_favicon" class="col-sm-2 col-form-label">Website Favicon</label>
        <div class="col-sm-10">
            <input type="file" name="website_favicon" id="website_favicon" required>
        <img src="/assets/images/website/{{ $setting->favicon }}" style="height: 50px; margin: 10px 0px;display:block">
        </div>
    </div>


    <div class="form-group row">
        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
        <div class="col-sm-10">
        <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook URL" required value="{{ $setting->facebook }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
        <div class="col-sm-10">
            <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Twitter URL" required value="{{ $setting->twitter }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
        <div class="col-sm-10">
            <input type="text" name="youtube" class="form-control" id="youtube" placeholder="Youtube URL" required value="{{ $setting->youtube }}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endsection
