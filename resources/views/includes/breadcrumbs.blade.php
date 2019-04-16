<div id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    {{ getLanguageValue($pageBanner) }}
                </h3>
                <ul>
                    <li><a href="/">Home</a></li>
                    @foreach (Request::segments() as $key=>$url)
                    <li {{ ($loop->last)? 'active':'' }}>{{ getLanguageValue(ucfirst($url)) }}</li>
                    @if ($key === 3)
                        @break
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
