@extends('layouts.main')
@section('content')

    <!--
        Feedback section (by super admin)
        Monthly cost
        total cost
        Duration to complete
        Languages    Arabic only          English only          both

    -->


    <form   method="POST" enctype="multipart/form-data" action="{{ route('update',$quotation->id) }}" novalidate="novalidate">
        {{ csrf_field() }}
    <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label >Name</label>
                                @if($quotation->name != null)
                                <input type="text" value="{{ $quotation->name }}"  name="name" placeholder="Enter name" class="form-control">
                                @else
                                <input type="text" name="name" placeholder="name" class="form-control">
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div   class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label>E-mail</label>
                                @if($quotation->email  != null)
                                <input type="email" value="{{ $quotation->email }}"  name="email" placeholder="Enter email" class="form-control">
                                @else
                                <input type="email"  name="email" placeholder="Enter Email" class="form-control">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div   class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <label>phone</label>
                                    @if($quotation->phone  != null)
                                    <input type="text" value="{{ $quotation->phone }}" name="phone" placeholder="Enter phone" class="form-control">
                                    @else
                                    <input type="text"  name="phone" placeholder="Enter phone" class="form-control">
                                    @endif
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div   class="col-md-8 col-sm-8">
                            <div   class="form-group">
                                <label >Quotation type </label>
                            <select required="required" name="quotation_type"  class="form-control">
                                @if($quotation->quotation_type  == null)
                                <option disabled> Select Quotation type </option>
                                <option value="ar">Arabic Only </option>
                                <option value="en">Engolish Only</option>
                                <option value="both">Both</option>

                                @else
                                    @if($quotation->quotation_type  == 'facebook')
                                        <option value="{{ $quotation->quotation_type  }}" selected> facebook </option>
                                        <option value="instagram">instagram</option>
                                        <option value="seo">seo </option>
                                        <option value="Web_site">Web_site </option>
                                        <option value="mobile_application">mobile_application </option>


                                     @elseif($quotation->quotation_type  == 'instagram')
                                     <option value="{{ $quotation->quotation_type  }}" selected> instagram </option>
                                     <option value="instagram">facebook</option>
                                     <option value="seo">seo </option>
                                     <option value="Web_site">Web_site </option>
                                     <option value="mobile_application">mobile_application </option>

                                     @elseif($quotation->quotation_type  == 'seo')
                                     <option value="{{ $quotation->quotation_type  }}" selected> seo </option>
                                     <option value="instagram">facebook</option>
                                     <option value="seo">instagram </option>
                                     <option value="Web_site">Web_site </option>
                                     <option value="mobile_application">mobile_application </option>
                                     'facebook', 'instagram', 'seo', 'Web_site' ,'mobile_application'
                                     @elseif($quotation->quotation_type  == 'Web_site')
                                     <option value="{{ $quotation->quotation_type  }}" selected> Web_site </option>
                                     <option value="instagram">facebook</option>
                                     <option value="seo">seo </option>
                                     <option value="Web_site">instagram </option>
                                     <option value="mobile_application">mobile_application </option>
                                     @elseif($quotation->quotation_type  == 'mobile_application')
                                     <option value="{{ $quotation->quotation_type  }}" selected> mobile_application </option>
                                     <option value="instagram">facebook</option>
                                     <option value="seo">seo </option>
                                     <option value="Web_site">instagram </option>
                                     <option value="mobile_application">Web_site </option>
                                     @endif
                                @endif

                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div   class="col-md-12">
                                <div   class="form-group">
                                    <label   for="description">Services Description </label>
                                    <textarea  name="description"  class="form-control" style="height: 120px;">{{ $quotation->message }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    <div   class="row">
                        <div   class="col-md-12">
                            <div   class="form-group text-center mt-30">
                                <button  type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

@endsection
