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
        <th scope="col">Status</th>
        <th scope="col">Forward</th>
      </tr>
    </thead>
    <tbody>
        @foreach($quotations as $quotation)
        @if($quotation->seen == 1 )
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
                <a href="{{ Route('ShowQuotation',$quotation->id)}} " style="background-color: rgba(0,139,139,1); color:azure;" class="btn btn-sm">View</a>
                </td>
                <td>
                    <a href="{{ Route('Destroy',$quotation->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @else
        <tr style="background-color: rgba(0,139,139,0.1)">
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
                <a href="{{ Route('ShowQuotation',$quotation->id)}} "class="btn btn-success btn-sm">View</a>
                </td>
                <td>
                    <a href="{{ Route('Destroy',$quotation->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endif
        @endforeach
    </tbody>
  </table>
  <div class=" float-right text-right">
      {{$quotations->links()}}
    </div>

@endsection
