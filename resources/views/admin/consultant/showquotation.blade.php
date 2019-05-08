@extends('layouts.admin.main')
@section('content')
<div class="card border-info mb-3 clo-lg-8" >
    <div class="card-header">Quotation # : {{ ucfirst( $quotation->id)  }}</div>
    <div class="card-body text-info">
      <h5 class="card-title">{{  ucfirst( $quotation->quotation_type) }}</h5>
      <h6 > Name : {{  ucfirst( $quotation->name) }}</h6>
      <h6 > Phone : {{  ucfirst( $quotation->phone) }}</h6>
      <h6 >E-mail : {{  ucfirst( $quotation->email) }}</h6>
      <p class="card-text"><div class="span">Quotation :</div>{{ $quotation->message }}</p>
        @if($quotation->forward ==0)
        <a href="{{ Route('forward',$quotation->id) }}" class="btn btn-xs  float-right" style="background-color: #17a2b8; color:azure ">Forward</a>
        @else
        <h6 class="float-right">This Quotation has been forwarded</h6>
        @endif
    </div>

@endsection
