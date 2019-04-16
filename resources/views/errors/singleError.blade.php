@if ($errors->has($error_name))
    <span class="errors-message">
        {{ $errors->first($error_name) }}
    </span>
@endif
