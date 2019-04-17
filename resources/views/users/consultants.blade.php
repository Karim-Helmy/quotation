@extends('layouts.main')
@section('content')
    @include('includes.breadcrumbs')
<div id="app">
    <app-consultant-component
    firstname="FirstName"
    email="Email"
    contactinfo="ContactInfo"
    laravelroute="consultant.store"
    phone="Phone"
    message="Message"
    submit-request="submitRequest">
    @include('includes.errors')
    </app-consultant-component>
</div>
@endsection
