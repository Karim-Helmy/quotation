@extends('layouts.admin.main')
@section('content')
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('countries.create')}}" class="btn btn-primary">
                Add Country
            </a>
        </div>
    </div>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>
                    Country Name
                </th>
                <th>
                    Country Logo
                </th>
                <th>
                    Cities
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
            </tr>
        </thead>
            <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>
                        {{ $country->country_name }}
                    </td>

                    <td>
                        <img src="/images/countries/{{$country->logo}}" height="50px">
                    </td>

                    <td>
                        <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info">
                            Cities
                        </a>
                    </td>
                    <td>
                        <a href="{{  route('countries.edit', $country->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('countries.delete', $country->id) }}" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
