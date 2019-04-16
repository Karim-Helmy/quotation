@extends('layouts.admin.main')
@section('content')
<div class="row ">
    <div class="col-12 text-right">
        <a href="{{ route('countries.create', ['country'=>$ID]) }}" class="btn btn-primary">
            Add Cities
        </a>
    </div>
</div>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>
            City
        </th>
        <th>
            Code
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
        @foreach($cities as $city)
            <tr>
                <td>
                    {{ ucfirst($city->country_name) }}
                </td>
                <td>
                    {{ ucfirst($city->code) }}
                </td>
                <td>
                    <a href="{{ route('countries.edit', $city->id) }}" class="btn btn-primary">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('countries.delete', $city->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
