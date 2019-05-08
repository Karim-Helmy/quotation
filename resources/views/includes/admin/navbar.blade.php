<ul class="navbar-nav ml-auto">
    <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

    </li>
</ul>
