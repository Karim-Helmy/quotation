@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('faq.store') }}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="f_label" class="col-sm-2 col-form-label">Question</label>
        <div class="col-sm-10">
            <input type="text" name="f_label" class="form-control" id="f_label" placeholder="Question" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="language" class="col-sm-2 col-form-label">Choose Language</label>
        <div class="col-sm-10">
            <select
                class="custom-select mr-sm-2"
                id="language"
                name="language"
                onchange="selectCategory(this)"
                required
            >
                <option disabled selected > Select Language </option>

                @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ ucfirst($language->language) }}</option>
                @endforeach

            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10" id="_category">
            <select class="custom-select mr-sm-2" id="category" name="category" required>
                <option disabled selected >Choose Category</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="an_label" class="col-sm-2 col-form-label">Answer</label>
        <div class="col-sm-10">
            <textarea name="an_label" id="editor" cols="30" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>

</form>

@endsection
