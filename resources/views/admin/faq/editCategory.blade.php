@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('update_category_faq', $category->id) }}">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="form-group row">
        <label for="category_name" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
@endsection
