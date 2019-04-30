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
    <form   method="POST" enctype="multipart/form-data" action="{{ route('superadmin.update',$q->id) }}" novalidate="novalidate">
        {{ csrf_field() }}
    <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <input type="text" name="mcost" placeholder="Enter Monthly cost" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div   class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <label>total cost</label>
                                <input type="text"  name="tcost" placeholder="Enter Total Cost" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div   class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <label>Duration to Compelete</label>
                                    <input type="text"  name="duration" placeholder="Enter Duration time" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                            <label >Language </label>
                            <select required="required" name="lang"  class="form-control">
                                <option disabled> Select Language </option>
                                <option value="ar">Arabic Only </option>
                                <option value="en">Engolish Only</option>
                                <option value="both">Both</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div   class="col-md-12">
                            <div   class="form-group">
                                <label   for="description">Feedback</label>
                                <textarea   name="feedback"  class="form-control" style="height: 120px;">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div   class="row">
                        <div   class="col-md-12">
                            <div   class="form-group text-center mt-30">
                                <button  type="submit" class="btn btn-secondary">calculate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
    @endforeach
@endsection
