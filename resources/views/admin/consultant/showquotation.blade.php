@extends('layouts.admin.main')
@section('content')
<div class="card border-info mb-3 clo-lg-8" >
    <div class="card-header">Quotation # : {{ ucfirst( $quotation->id)  }}</div>
    <div class="card-body text-info">
      <h5 class="card-title">{{  ucfirst( $quotation->quotation_type) }}</h5>
      <h6 > Name : {{  ucfirst( $quotation->name) }}</h6>
      <h6 > Phone : {{  ucfirst( $quotation->phone) }}</h6>
      <h6 >E-mail : {{  ucfirst( $quotation->email) }}</h6>
      <h6 >Created At : {{   $quotation->created_at }}</h6>
      <p class="card-text"><div class="span">Quotation :</div>{{ $quotation->message }}</p>
      @if( $quotation->feedback)
     <h6>Super Feedback : {{ ucfirst($quotation->feedback) }}</h6>
      @else
      @endif

      @if( $quotation->feedback)
      <h6>Monthly Cost  : {{ ucfirst($quotation->monthly_cost ) }}</h6>
       @else
       @endif
        @if( $quotation->feedback)
     <h6>Total Cost : {{ ucfirst($quotation->total_cost ) }}</h6>
      @else
      @endif

      @if( $quotation->feedback)
      <h6>Compeletion duration  : {{ $quotation->Compeletion_duration }}</h6>
       @else
       @endif
       
        @if($quotation->forward ==0)
        <a href="{{ Route('forward',$quotation->id) }}" class="btn btn-xs  float-right" style="background-color: #17a2b8; color:azure ">Forward</a>
        @else
        <h6 class="float-right">This Quotation has been forwarded</h6>
        @endif
    </div>

@endsection
