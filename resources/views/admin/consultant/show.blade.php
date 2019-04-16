@extends('layouts.admin.main')
@section('content')
<style>
    dd,
    dt {
        padding: 10px 0px;
        margin: 0;
        border-bottom: 1px solid #eee;
    }
</style>
<dl class="row">

    <dt class="col-sm-3">Firstname</dt>
    <dd class="col-sm-9">{{ ucwords($consultant->firstname_booking) }}</dd>

    <dt class="col-sm-3">Lastname</dt>
    <dd class="col-sm-9">{{ ucwords($consultant->lastname_booking) }}</dd>

    <dt class="col-sm-3">Email Address</dt>
    <dd class="col-sm-9"><a href="mailto:{{ $consultant->email_booking }}">{{ ucwords($consultant->email_booking) }}</a></dd>

    <dt class="col-sm-3">Phone Number</dt>
    <dd class="col-sm-9">{{ ucwords($consultant->phone) }}</dd>

    <dt class="col-sm-3">Message</dt>
    <dd class="col-sm-9">{{ ucwords($consultant->message) }}</dd>

    <dt class="col-sm-3">Images</dt>
    <dd class="col-sm-9">
        @foreach ($consultant->get_images as $image)
        <a href="/images/consultants/{{ $image->images }}">
                <img src="/images/consultants/{{ $image->images }}" style="width: 80px; height:80px; margin: 5px;">
            </a> @endforeach
    </dd>

    <dt class="col-sm-3">Consultant Id</dt>
    <dd class="col-sm-9">
        <input type="text" id="input" class="form-control" value="{{ $consultant->consultant_id }}" disabled>
        <span id="copyId" style="cursor:pointer" title="Click Here">
            copy to clipboard
        </span>
        <span id="copied" style="color: #6610f2;text-transform:uppercase;font-weight:bolder;display: none;">
            copied
        </span>
    </dd>

    <dt class="col-sm-3">Select Doctor</dt>
    <dd class="col-sm-9">
        <select class="custom-select form-control" id="doctor">
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ ucwords($doctor->name) }}</option>
        @endforeach
    </select>
    </dd>

    <dt class="col-sm-3">Message</dt>
    <dd class="col-sm-9">
        <textarea name="message" style="height: 100px;  white-space: nowrap;
        " id="message" class="form-control" placeholder="Message for the Doctor" required></textarea>
    </dd>

    <dt class="col-sm-3">Submit Request</dt>
    <dd class="col-sm-9">
        <button class="btn btn-primary form-control" id="senddata">
            Send
        </button>
    </dd>


</dl>

<div class="row">

    <h6 class="col-sm-3">
        Assigned Into
    </h6>

    <table class="table table-bordered col-sm-9">
        <thead>
            <th>
                Doctor
            </th>
        </thead>
        <tbody>
            @foreach ($consultant->doctors as $doctor)
            <tr>
                <td>
                    {{ ucfirst($doctor->name) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="row">

    <h6 class="col-sm-3">
        Doctors Replay
    </h6>

    <table class="table table-bordered col-sm-9">
        <thead>
            <th>
                Doctor
            </th>
            <th>
                Replayed Message
            </th>
        </thead>
        <tbody>
            @foreach ($consultant->doctor_replay as $doctor)
            <tr>
                <td>
                    {{ ucfirst($doctor->name) }}
                </td>
                <td>
                    {{ ucfirst($doctor->pivot->replay) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('customJs')
<script>
    $("#copyId").click(() => {
        var copyText = document.querySelector("#input");
        copyText.select();
        document.execCommand("copy");
        $("#copied").fadeIn('fast')
        setTimeout(() => {
            $("#copied").fadeOut('fast')
        }, 1000);
        const consultant_id = $("#input").val();
        const doctor = $("#doctor option:selected").text();
        let message = 'Doctor ' + doctor;
        message += ' Consultant With id #'+consultant_id + ' requires your urgent inquiry';
        $("#message").text(message)
    })

    $("#senddata").click(() => {
        const doctorId = $("#doctor").val();
        const consultant_id = $("#input").val();
        const message = $("#message").text();
        const csrf = $('meta[name="csrf-token"]').attr('content');
        $("#senddata").text('Loading ... ');
        $("#senddata").css('cursor', 'not-allowed')
        $("#senddata").addClass('disabled', 'disabled');

        $.ajax({
            method: "POST",
            url: "{{ route('admin.consultant.sendDoctor') }}",
            data: {
                _token: csrf,
                doctorId: doctorId,
                message: message,
                consultant_id: consultant_id
            },
            success: (results)=>{
                console.log(results)
                if (results == 'done') {
                    $("#senddata").text('Sent Successfully');
                    $("#message").addClass('is-valid');
                    $("#senddata").css('cursor', 'pointer');
                    $("#senddata").prop('disabled', false);
                    $("#senddata").removeClass('disabled');
                } else if (results == 'exists'){
                    $("#senddata").text('This Consultnt Already Asigned into This Doctor');
                    $("#senddata").css('cursor', 'not-allowed');
                    $("#senddata").removeClass('active');
                    $("#senddata").removeClass('btn-primary');
                    $("#senddata").addClass('btn-danger');
                    $("#senddata").attr('disabled', 'disabled');
                    $("#senddata").removeClass('active');
                } else {
                    $("#senddata").text('An Error Occured Please Try again');
                    $("#senddata").css('cursor', 'not-allowed');
                    $("#senddata").removeClass('active');
                    $("#senddata").removeClass('btn-primary');
                    $("#senddata").removeClass('disabled');
                    $("#senddata").attr('disabled', 'disabled');
                    $("#senddata").addClass('btn-danger');
                }
            }, error(err){
                if (err.status === 422) { // Validation Error
                    $("#message").addClass('is-invalid');
                    $("#message").text("This Field is Required");
                    $("#senddata").css('cursor', 'pointer');
                    $("#senddata").prop('disabled', false);
                    $("#senddata").removeClass('disabled');
                    $("#senddata").text('Send Again');
                }
            }
        })
    });

</script>
@endsection
