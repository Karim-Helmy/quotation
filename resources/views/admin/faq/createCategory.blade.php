@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('store_category_faq') }}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="category_name" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="category_name"
                name="category_name"
                placeholder="Category Name"
                required
            >
        </div>
    </div>
    @include('includes.admin.languages')
    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection
