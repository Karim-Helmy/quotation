<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        @if(Auth::user()->level == 'admin')
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">
               All Quotations
            </span>
        </a>
        <a class="nav-link" href="{{ route('admin.accepted') }}">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">
                    Accepted Quotations
                </span>
            </a>
        @elseif(Auth::user()->level=='super_admin')
        <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">
                   Super Quotation
                </span>
            </a>

        @endif

    </li>

    </ul>
