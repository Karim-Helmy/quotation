@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('values.update', $value->id) }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    @method('PATCH')

    <div class="form-group row">
        <label for="value" class="col-sm-2 col-form-label">Value</label>
        <div class="col-sm-10">
            <input type="text" name="value" class="form-control" id="value" placeholder="Value" required value="{{ $value->value }}">
        </div>
    </div>

    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
