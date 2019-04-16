@extends('layouts.admin.main')

@section('content')

<form method="POST" action="{{ route('diseases-categories.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}


    <div class="form-group row">
        <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input
            type="text"
            name="category_name"
            id="category_name"
            class="form-control"
            placeholder="Category name"
            required
            >
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>

</form>
@endsection
