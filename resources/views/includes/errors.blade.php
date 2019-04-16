<div class="row">
    <div class="col-12">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="text-center">
            <span class="text-capitalize text-danger" style="font-weight: bold;font-size: small;">
                {{ $error }}
            </span>
        </div>
        @endforeach
        @endif
    </div>
</div>
