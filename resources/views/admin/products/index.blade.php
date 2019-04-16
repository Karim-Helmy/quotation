@extends('layouts.admin.main')
@section('content')
<div class="row">
    <div class="col-12 text-right">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            New Drug
        </a>

    </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

</table>

@endsection
