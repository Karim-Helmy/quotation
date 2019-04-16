@extends('layouts.main')
@section('content')
@include('includes.breadcrumbs')

<div class="container margin_60">
    <div class="row">
        <aside class="col-lg-3" id="sidebar">
                <div class="box_style_cat" id="faq_box">
                    <ul id="cat_nav">
                        @foreach ($faqs as $key=>$faq)
                        <li><a href="#{{ "FQEM".$key."X45D" }}">
                            <i class="icon_document_alt"></i>{{ ucfirst($faq->category) }}</a></li>
                        @endforeach
                    </ul>
                </div>
        </aside>

        <div class="col-lg-9" id="faq">

        @foreach ($faqs as $key=>$faq)

            <h4 class="nomargin_top">{{ ucfirst($faq->category) }}</h4>

            <div role="tablist" class="add_bottom_45 accordion" id="{{ "FQEM".$key."X45D" }}">
                @foreach ($faq->faq as $key=>$singlefaq)

                <div class="card">

                    <div class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse"
                            href="#collapse{{ $key.$singlefaq->id }}Tab">
                                <i class="indicator icon_plus_alt2"></i>{{ ucfirst($singlefaq->question) }}
                            </a>
                        </h5>
                    </div>

                    <div id="collapse{{ $key.$singlefaq->id }}Tab" class="collapse" role="tabpanel" data-parent="#{{ "FQEM".$key."X45D" }}">
                        <div class="card-body">
                            {!! $singlefaq->answer !!}
                        </div>
                    </div>

                </div>

                @endforeach

            </div>

            @endforeach
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->


@endsection
