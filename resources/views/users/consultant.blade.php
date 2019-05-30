@extends('layouts.main')
@section('content')
    <!-- Mobile menu overlay mask -->
    <div id="preloader" style="display: none;">
        <div data-loader="circle-side" style="display: none;"></div>
    </div>
    <!-- End Preload -->
    <main>
            @if(session()->has('message'))

            <div class="alert alert-success col-lg-12  text-center">
               <h3> <b>{{ session()->get('message') }}</b> </h3>
            </div>
        @endif
<div id="app">
    <div   class="container margin_60">
    <div   class="row">
        <div   class="col-xl-12">
            <div   class="box_general_3 cart">
                <div   class="form_title">
                    <div   class="row">
                        <div   class="col-12">
                            </div>
                        </div>
                         <h3   class="home_title" style="text-align:center">Add Quotation Info</h3>

        </div>

       <form   method="POST" enctype="multipart/form-data" action="{{ route('consultant.store') }}" novalidate="novalidate">
        {{ csrf_field() }}

            <div   class="step">
                <div   class="row">
                    <div   class="col-md-6 col-sm-6">
                        <div   class="form-group">
                            <label  >Name</label>
                            <input   required="required" type="text" name="name" placeholder="Enter your Name" class="form-control"></div>
                        </div>

                </div>
                    <div   class="row">
                        <div   class="col-md-6 col-sm-6">
                            <div   class="form-group">
                                <label  >Email</label>
                                <input   required="required" type="email"  name="email" placeholder="Enter your Email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-6 col-sm-6">
                            <div   class="form-group">
                                <label>Phone</label>
                                <input   required="required" type="text"  name="phone" placeholder="Enter your Phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-6 col-sm-6">
                            <div   class="form-group">
                                <label  >Quotation type </label>
                            <select required="required" name="quotation_type"  class="form-control">
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="seo">SEO</option>
                                <option value="Web_site">Web Site</option>
                                <option value="mobile_app">Mobile Application</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div   class="col-md-12">
                            <div   class="form-group">
                                <label   for="description">Services Description </label>
                                <textarea   name="description"  class="form-control" style="height: 120px;">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-12">
                            <div   class="form-group text-center mt-30">
                                <button  type="submit" class="btn btn-primary">Request</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>






    </div>
    <div  >

    </div>
</div>
</div>
<div>
    </main>

    @include('includes.errors')
    @endsection
