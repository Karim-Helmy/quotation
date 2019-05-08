@extends('layouts.admin.main')
@section('content')
    @foreach ($quotation as $q)
    <!--
        Feedback section (by super admin)
        Monthly cost
        total cost
        Duration to complete
        Languages    Arabic only          English only          both

    -->
    <form   method="POST" enctype="multipart/form-data" action="{{ route('recalculate',$q->id) }}" novalidate="novalidate">
        {{ csrf_field() }}
    <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label >Monthly cost</label>
                                @if($q->monthly_cost != null)
                                <input type="text" value="{{ $q->monthly_cost }}"  name="mcost" placeholder="Enter Monthly cost" class="form-control">
                                @else
                                <input type="text" name="mcost" placeholder="Enter Monthly cost" class="form-control">
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div   class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label>total cost</label>
                                @if($q->total_cost  != null)
                                <input type="text" value="{{ $q->total_cost }}"  name="tcost" placeholder="Enter Total Cost" class="form-control">
                                @else
                                <input type="text"  name="tcost" placeholder="Enter Total Cost" class="form-control">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div   class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <label>Duration to Compelete</label>
                                    @if($q->Compeletion_duration  != null)
                                    <input type="text" value="{{ $q->Compeletion_duration }}" name="duration" placeholder="Enter Duration time" class="form-control">
                                    @else
                                    <input type="text"  name="duration" placeholder="Enter Duration time" class="form-control">
                                    @endif
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div   class="col-md-8 col-sm-8">
                            <div   class="form-group">
                                <label >Language </label>
                            <select required="required" name="lang"  class="form-control">
                                @if($q->language  == null)
                                <option disabled> Select Language </option>
                                <option value="ar">Arabic Only </option>
                                <option value="en">Engolish Only</option>
                                <option value="both">Both</option>

                                @else
                                    @if($q->language  == 'en')
                                        <option value="{{ $q->language  }}" selected> Eglish Only </option>
                                        <option value="both">Both</option>
                                        <option value="ar">Arabic Only </option>

                                     @elseif($q->language  == 'ar')
                                        <option value="{{ $q->language  }}" selected> Arabic Only </option>
                                        <option value="both">Both</option>
                                        <option value="ar">Arabic Only </option>

                                     @elseif($q->language  == 'both')
                                        <option value="{{ $q->language  }}" selected> Both  </option>
                                        <option value="en" >English Only</option>
                                        <option value="ar" >Arabic Only </option>
                                     @endif
                                @endif

                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div   class="col-md-12">
                            <div   class="form-group">
                            <label   for="description">Feedback</label>
                                @if($q->feedback  != null)
                                    <textarea  name="feedback" value=""  class="form-control" style="height: 120px;">{{ $q->feedback }}
                                    </textarea>
                                    @else
                                    <textarea  name="feedback" class="form-control" style="height: 120px;">
                                    </textarea>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-12">
                            <div   class="form-group text-center mt-30">
                                <button  type="submit" class="btn btn-primary">Re-calculate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
    @endforeach
@endsection
