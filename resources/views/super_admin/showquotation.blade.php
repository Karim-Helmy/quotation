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
      @if($quotation->total_cost)
      <h6 >Monthly Cost :
            {{ $quotation->monthly_cost }}
      </h6>
      @else
     @endif
    @if($quotation->total_cost)
      <h6 >Total Cost :
            {{ $quotation->total_cost }}
      </h6>
      @else
     @endif

      @if($quotation->Compeletion_duration)
      <h6 >Compeletion Duration :
            {{ $quotation->Compeletion_duration  }}
      </h6>
      @else
      @endif
      @if($quotation->language)
      <h6 >language :
            {{ $quotation->language }}
      </h6>
      @else
      @endif

      @if($quotation->Compeletion_duration)
      <h6 >Feed Back  :
            {{ $quotation->feedback  }}
      </h6>
      @else
      @endif
      <a href="{{ Route('Destroyfromsuper',$quotation->id)}}"style="margin:5px;" class="btn btn-danger col-lg-2 float-right btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" >Delete  </a>
    @if($quotation->approval != 0 )
        @if($quotation->monthly_cost || $quotation->total_cost)
        <a href="{{ Route('recalculateview',$quotation->id)}}" class="btn btn-sm col-lg-2 float-right" style="background-color: #17a2b8; margin:5px; color:azure ">Re-Calculate</a>
        @else
        <a href="{{ Route('calculate',$quotation->id)}}" class="btn btn-sm col-lg-2 float-right" style="background-color: #17a2b8; margin:5px; color:azure ">Calculate</a>
        @endif
    @endif



    </div>
@endsection
