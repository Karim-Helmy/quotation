@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('key.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group row">
        <label for="keyname" class="col-sm-2 col-form-label">Key Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="keyname" id="keyname" placeholder="Enter Key Name">
        </div>
    </div>

    <div class="form-group text-center">
        <button class="btn btn-primary">
            Create
        </button>
    </div>
</form>
@endsection
