@extends('layouts.main')
@section('content')
<br>
<div class="card border-info mb-3 clo-lg-8" >
        <div class="card-header">Quotation Code : {{ ucfirst( $quotation->quotation_code)  }}</div>
        <div class="card-body text-info">
          <h5 class="card-title">Quotation Name : {{  ucfirst( $quotation->name) }}</h5>
          <h5 class="card-title">Quotation Type : {{  ucfirst( $quotation->quotation_type) }}</h5>
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
          <h6> Approval :
          @if($quotation->approval == 1)
                Approved
          @elseif($quotation->approval == null)
                Waiting For Approval
          @else
                rejected
          @endif
        </h6>
          @if($quotation->Compeletion_duration)
          <h6 >Feed Back  :
                {{ $quotation->feedback  }}
          </h6>
          @else
          @endif

          @if($quotation->seen == 0)
            <a href="{{ Route('edit',$quotation->id)}}" style="margin:5px;" class="btn btn-success bt-md float-right">Edit</a>
          @else
          @endif
          <a href="{{ URL::previous() }}"  style="margin:5px;" class="btn btn-primary bt-md float-right">Back</a>
</div>


@endsection
