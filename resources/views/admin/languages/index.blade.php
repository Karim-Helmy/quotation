@extends('layouts.admin.main')

@section('content')
<div class="row">
    <div class="col-12 text-right">
        <a href="{{ route('language_new') }}" class="btn btn-primary">
            New Language
        </a>
    </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>
            Language
        </th>
        <th>
            Prefix
        </th>
        <th>
            Language F A V I C O N
        </th>
        <th>
            Labels
        </th>
        <th>
            Edit
        </th>
        <th>
            Status
        </th>
    </thead>
    <tbody>
        @foreach ($languages as $language)
            <tr>
                <th>
                    {{ ucfirst($language->language) }}
                </th>
                <th>
                    {{ $language->prefix }}
                </th>
                <th>
                    <img src="/images/languages/{{ $language->favicon }}" height="50px">
                </th>
                <th>
                    <a href="{{ route('languages.labels', $language->id) }}" class="btn btn-info">
                        Labels
                    </a>
                </th>
                <th>
                    <a href="{{ route('language_edit', $language->id) }}" class="btn btn-primary">
                        Edit
                    </a>
                </th>
                <th>
                    {{ csrf_field() }}
                    <button
                        class="btn {{ ($language->status === 1) ? 'btn-success' : 'btn-info' }}"
                        onclick="{{ ($language->status === 1) ? 'DeActive(this)' : 'Active(this)' }}"
                        value="{{ $language->id }}"
                        >
                        {{ ($language->status === 1) ? 'Active' : 'In Active' }}
                    </button>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
