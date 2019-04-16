@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('faq.update', $faq->id) }}">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="form-group row">
        <label for="f_label" class="col-sm-2 col-form-label">Question</label>
        <div class="col-sm-10">
            <input type="text" name="f_label" class="form-control" id="f_label" placeholder="Question" required value="{{ $faq->question }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select class="custom-select mr-sm-2" id="category" name="category" required>
                <option disabled selected >Choose Category</option>
                @foreach ($categories as $category)
                    <option
                    {{ ($faq->category_id === $category->id) ? 'selected' : '' }}
                    value="{{ $category->id }}">
                    {{ $category->category }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="an_label" class="col-sm-2 col-form-label">Answer</label>
        <div class="col-sm-10">
            <textarea name="an_label" id="editor" cols="30" rows="10">
                {!! $faq->answer !!}
            </textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
@endsection
