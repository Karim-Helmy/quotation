<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    @foreach (Request::segments() as $key=>$item)
        @if ($loop->first)
            @continue
        @endif
        @if ($key === 2)
            @break
        @endif
    <li class="breadcrumb-item active">
        {{ ucfirst($item) }}
    </li>
    @endforeach
</ol>
