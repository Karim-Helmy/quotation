@extends('layouts.admin.main')
@section('content')
<div class="row">
    <div class="col-12 text-right">
        <a href="{{ route('diseases-categories.create') }}" class="btn btn-primary">
            Create Category
        </a>
    </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>
            Category
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>

    <tbody>
        @foreach ($diseases as $disease)
            <tr>
                <td>
                    {{ $disease->category }}
                </td>
                <td>
                    <a href="{{ route('diseases-categories.edit', $disease->id) }}" class="btn btn-primary">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('diseases-categories.destroy', $disease->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger delete-button" type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
