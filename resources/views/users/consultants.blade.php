@extends('layouts.main')
@section('content')
    @include('includes.breadcrumbs')
<div id="app">
    <app-consultant-component
    firstname="{{ getLanguageValue('FirstName') }}"
    lastname="{{ getLanguageValue('LastName') }}"
    email="{{ getLanguageValue('Email') }}"
    confirm-email="{{ getLanguageValue('ConfirmEmail') }}"
    contactinfo="{{ getLanguageValue('ContactInfo') }}"
    laravelroute="{{ route('consultant.store') }}"
    phone="{{ getLanguageValue('Phone') }}"
    message="{{ getLanguageValue('Message') }}"
    submit-request="{{ getLanguageValue('submitRequest') }}">
    @include('includes.errors')
    </app-consultant-component>
</div>
@endsection
