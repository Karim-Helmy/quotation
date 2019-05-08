@extends('layouts.main')
@section('content')
<div class="container col-lg-11 box_general_3">
<ul class="nav nav-tabs text-center" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#quotation" role="tab" aria-controls="quotation" aria-selected="false">Quotations</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <div class="container">
                    <h5>{{ Auth::user()->level }}</h5>
                    <h1>{{ ucfirst(Auth::user()->name) }}</h1>

                    <h5>Mail</h5>
                    <h3>{{ ucfirst(Auth::user()->email) }}</h3>
                    <h5>Phone</h5>
                    <a href="tel://{{ Auth::user()->phone }}">{{ Auth::user()->phone }}</a></li>

                </div>
            </div>
            <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
                <br>
                <div class="container col-lg-12">
                    <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Quotation code</th>
                                <th scope="col">Quotation type</th>
                                <th scope="col">Language</th>
                                <th scope="col">Admin feedback</th>
                                <th scope="col">Monthly cost</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Total cost</th>
                                <th scope="col">Approval</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($quotations as $quotation)
                                <tr>
                                    <td>{{ $quotation->quotation_code }}</td>
                                    <td> {{ $quotation->quotation_type  }} </td>
                                    <td> {{ $quotation->language  }} </td>
                                    <td> {{ str_limit($quotation->feedback,30)  }} </td>
                                    <td> {{ $quotation->monthly_cost  }} </td>
                                    <td> {{ $quotation->Compeletion_duration  }} </td>
                                    <td> {{ $quotation->total_cost  }} </td>
                                    <td>
                                      @if($quotation->approval == 1)
                                            Approved
                                      @elseif($quotation->approval == null)
                                            Waiting For Approval
                                      @else
                                            rejected
                                      @endif
                                    </td>
                                    <td><a href="{{ Route('showuserquotation',$quotation->id)}} "class="btn btn-primary btn-sm">View</a></td>
                                    @if($quotation->seen == 0)
                                    <td><a href="{{ Route('Destroyfromuser',$quotation->id)}}"style="margin:5px;" class="btn btn-danger  btn-sm"  title="Msg to be shown" onclick="return confirm('Are you sure you want to delete this item?');" >Delete  </a></td>
                                    @else
                                    <td><span class="tool-tip" data-toggle="tooltip"  title="You can't Delete this quotation as it hes been forwarded to admin"><a href="#"style="margin:5px;" title="Msg to be shown" class="btn btn-danger btn-disabled btn-sm" onclick="return false;" class="disabled" >Delete  </a></td>
                                    </span>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                          </table>
                        </div>
                    </div>
                    
      </div>
    </div>
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
