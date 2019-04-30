@extends('layouts.admin.main')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Type</th>
        <th scope="col">Quotation</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Ordered at</th>
        <th scope="col">Show</th>
      </tr>
    </thead>
    <tbody>
        @foreach($quotations as $quotation)


        <tr>
                <th scope="row">
                    @if($quotation->id)
                    {{ $quotation->id }}
                    @else <?php
                    echo $i=1;
                    ?>
                    @endif
                </th>
                <td>{{ $quotation->quotation_type }}</td>
                <td>{{  str_limit($quotation->message, 50) }}</td>
                <td>{{ $quotation->name }}</td>
                <td>{{ $quotation->email }}</td>
                <td>{{ $quotation->phone }}</td>
                <td>{{ $quotation->created_at }}</td>
                <td>
                <a href="{{ Route('showquotation',$quotation->id)}} "class="btn btn-success btn-sm">View</a>
                </td>
            </tr>



        @endforeach

    </tbody>
  </table>
@endsection
