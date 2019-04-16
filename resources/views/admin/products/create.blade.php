@extends('layouts.admin.main')
@section('content')
<form method="POST" action="{{ url('admin/products/store') }}">

    {{ csrf_field() }}
        @foreach ($languages as $language)

        <div class="col-md-12 text-center" style="border-style: dashed;margin-bottom: 10px">
            <h1>{{$language->language}} Information</h1>
        </div>
            <div class="form-group row">
                <label for="main_name" class="col-sm-2 col-form-label">{{$language->language}} Main Name</label>
                <div class="col-sm-10">
                    <input type="text" name="{{$language->prefix}}_main_name" class="form-control" id="f_label" placeholder="{{$language->language}} Main Name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="medical_name" class="col-sm-2 col-form-label">{{$language->language}} Medical Name</label>
                <div class="col-sm-10">
                    <input type="text" name="{{$language->prefix}}_medical_name" class="form-control" id="f_label" placeholder="{{$language->language}} Medical Name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="other_name" class="col-sm-2 col-form-label">{{$language->language}} Other Name</label>
                <div class="col-sm-10">
                    <input type="text" name="{{$language->prefix}}_other_name" class="form-control" id="f_label" placeholder="{{$language->language}} Other Name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">{{$language->language}} Description</label>
                <div class="col-sm-10">
                    <textarea name="{{$language->prefix}}_description" id="editor{{$language->id}}" cols="30" rows="10"></textarea>
                </div>
            </div>



        <div class="form-group row " id="other{{$language->id}}" style="border-style: solid;border-radius: 10px;padding: 10px;display: none">
                                 <div class="col-md-10 text-center">
                                     <h3>{{$language->language}} Prescription</h3>
                                 </div>
              <div class="col-sm-10" style="margin-top: 10px">
                 <h6>What is this medicine?</h6>
              </div>
              <div class="col-sm-10">
                  <input type="hidden" name="{{$language->prefix}}_question1" value="What is this medicine?">
                <input type="text" name="{{$language->prefix}}_answer1" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
              </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>What should I tell my health care provider before I take this medicine?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question2" value="What should I tell my health care provider before I take this medicine?">
                <input type="text" name="{{$language->prefix}}_answer2" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>How should I use this medicine?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question3" value="How should I use this medicine?">
                <input type="text" name="{{$language->prefix}}_answer3" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>What if I miss a dose?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question4" value="What if I miss a dose?">
                <input type="text" name="{{$language->prefix}}_answer4" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>What may interact with this medicine?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question5" value="What may interact with this medicine?">
                <input type="text" name="{{$language->prefix}}_answer5" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>What should I watch for while using this medicine?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question6" value="What should I watch for while using this medicine?">
                <input type="text" name="{{$language->prefix}}_answer6" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>What side effects may I notice from receiving this medicine?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question7" value="What side effects may I notice from receiving this medicine?">
                <input type="text" name="{{$language->prefix}}_answer7" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

            <div class="col-sm-10" style="margin-top: 10px">
                <h6>Where should I keep my medicine?</h6>
            </div>
            <div class="col-sm-10">
                <input type="hidden" name="{{$language->prefix}}_question8" value="Where should I keep my medicine?">
                <input type="text" name="{{$language->prefix}}_answer8" class="form-control" id="f_label" placeholder="{{$language->language}} Answer" >
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-12 text-center">
                <button class="btn btn-warning" onclick="showUploadForm()" type="button">
                  Add Drug Prescription
                </button>

            </div>
        </div>


<hr><hr>
        @endforeach


    <div class="form-group row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>

</form>

@endsection
@section('customJs')

    <script>

    @foreach($languages as $language)
        CKEDITOR.replace( document.querySelector('#editor{{$language->id}}') );
    @endforeach



    const showUploadForm = ()=>{
        @foreach($languages as $language)
        $("#other{{$language->id}}").fadeToggle('fast');
        @endforeach
        var x = document.getElementById("other{{$language->id}}\"");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    </script>

@endsection