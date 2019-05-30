@extends('layouts.admin.main')
@section('content')

@if(empty($quotations))
    <div class="alert alert-warning" role="alert">
        No Quotation forwarded yet
    </div>
    @else
    <div class="row">
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
                <th scope="col">Reject</th>
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
                <td>
                    @if($quotation->approval == '1' ||$quotation->approval ==null)
                    <a href="{{ Route('reject',$quotation->id)}} "class="btn btn-danger btn-sm">Reject</a>
                    @else
                    <a href="{{ Route('approve',$quotation->id)}} "class="btn btn-primary btn-sm">Approve</a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class=" float-right text-right">
    {{$quotations->links()}}
</div>
@endif
<style>

        .btn-disabled,
        .btn-disabled[disabled] {
        opacity: .4;
        cursor: default !important;
        pointer-events: none;
        }
        .tool-tip [disabled] {
        pointer-events: none;
        }
</style>
<script>$ ->
    $('[data-toggle="tooltip"]').tooltip()
    </script>

@endsection
