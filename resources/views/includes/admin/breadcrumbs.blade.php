<ol class="breadcrumb">
    <li class="breadcrumb-item">
        @if(Auth::user()->level == 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        @elseif(Auth::user()->level=='super_admin')
            <a href="{{ route('superadmin.dashboard') }}">Dashboard</a>
        @endif
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
