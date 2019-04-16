@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ route('languages.labels.save', $language->id) }}">

    {{ csrf_field() }} @foreach ($labels as $label)

    <div class="form-group row">
        <label for="{{ $label->key }}" class="col-sm-2 col-form-label">{{ $label->key }}</label>
        <div class="col-sm-10">
        <input type="text" name="{{ $label->key }}" class="form-control" id="{{ $label->key }}" placeholder="Enter {{$label->key}} Value" required
                value="{{ get1LanguageValue($label->key, $language->id) }}">
        </div>
    </div>

    @endforeach

    <div class="form-group text-center">
        <button class="btn btn-success" type="submit">
            Update
        </button>
    </div>

</form>
@endsection
