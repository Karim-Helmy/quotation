@extends('layouts.admin.main')
@section('content')
<div class="row">
    <div class="col-12 text-right">
        <a href="{{ route('faq.create') }}" class="btn btn-primary">
            New FAQ
        </a>
        <a href="{{ route('create_faq_category') }}" class="btn btn-primary">
            Create Category
        </a>
    </div>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
@foreach ($faqsCategories as $faqCategory)

    <thead>
        <th colspan="4" class="text-center text-style-1">
            {{ $faqCategory->category }}
        </th>
    </thead>

    <tbody>
        <tr>
            <td colspan="2" class="text-center" style="padding: 20px!important">
                {{ $faqCategory->category }}
            </td>
            <td>
                <a href="{{ route('edit_faq_category', $faqCategory->id) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('delete_faq_category') }}" method="POST">
                    {{ csrf_field() }}

                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $faqCategory->id }}">
                    <button type="submit" class="btn btn-danger delete-button">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        <tr>
            <th>
                Question
            </th>
            <th colspan="3">
                Answer
            </th>
        </tr>
        @foreach ($faqCategory->faq as $faqs)
        <tr>
            <td>
                {{ $faqs->question }}
            </td>
            <td>
                {!! $faqs->answer !!}
            </td>
            <td>
                <a href="{{ route('faq.edit', $faqs->id) }}" class="btn btn-primary">
                    Edit
                </a>
            </td>
            <td>
                <form action="{{ route('faq.destroy', $faqs->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $faqs->id }}">
                    <button type="submit" class="btn btn-danger delete-button">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>


    @endforeach
</table>

@endsection
