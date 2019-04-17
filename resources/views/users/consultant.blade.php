@extends('layouts.main')
@section('content')



    <!-- Mobile menu overlay mask -->

    <div id="preloader" style="display: none;">
        <div data-loader="circle-side" style="display: none;"></div>
    </div>
    <!-- End Preload -->


    <main>
<div id="app"><div   class="container margin_60">
    <div   class="row">
        <div   class="col-xl-12">
            <div   class="box_general_3 cart">
                <div   class="form_title">
                    <div   class="row">
                        <div   class="col-12">
                            </div>
                        </div>
                         <h3   class="home_title" style="text-align:center">Quotation Info</h3>

        </div>
        <form   action="consultant.store" id="Consultant" method="POST" enctype="multipart/form-data" novalidate="novalidate">
            <input   required="required" type="hidden" name="_token" value="qOUIIn96Us0ahvZ5afX0oh6EQqS433ZrGKYl7CBa">
            <div   class="step">
                <div   class="row">
                    <div   class="col-md-6 col-sm-6">
                        <div   class="form-group">
                            <label  >Name</label>
                            <input   required="required" type="text" name="firstname_booking" placeholder="Enter your Name" class="form-control"></div>
                        </div>

                </div>
                    <div   class="row">
                        <div   class="col-md-6 col-sm-6">
                            <div   class="form-group">
                                <label  >Email</label>
                                <input   required="required" type="email"  name="email_booking" placeholder="Enter your Email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-6 col-sm-6">
                            <div   class="form-group">
                                <label  >Phone</label>
                                <input   required="required" type="text"  name="telephone_booking" placeholder="Enter your Phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-6 col-sm-6">
                            <div   class="form-group">
                                <label  >Quotation type </label>
                            <select required="required" name="quotation_type"  class="form-control">
                                <option value="FB">Facebook</option>
                                <option value="FB">Instagram</option>
                                <option value="FB">SEO</option>
                                <option value="FB">Web Site</option>
                                <option value="FB">Mobile Application</option>
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
                                <button   type="submit" class="btn btn-secondary">Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr  >
        </div>
    </div>
    <div  >
        <div id="modal-center___BV_modal_outer_" style="position: absolute; z-index: 2000;">
            <div id="modal-center" role="dialog" tabindex="-1" aria-hidden="true" class="modal fade" style="display: none;">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div role="document" id="modal-center___BV_modal_content_" aria-labelledby="modal-center___BV_modal_header_" aria-describedby="modal-center___BV_modal_body_" class="modal-content">
                        <header id="modal-center___BV_modal_header_" class="modal-header">
                            <h5   class="modal-title">Submit Request</h5>
                        </header>
                        <div id="modal-center___BV_modal_body_" class="modal-body"> <ul  ><li  >

    </main>

    @include('includes.errors')
    @endsection
