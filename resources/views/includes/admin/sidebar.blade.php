<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">
                Dashboard
            </span>
        </a>
    </li>



    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">My profile</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseProfile">
            <li>
                <a href="user-profile.html">User profile</a>
            </li>
            <li>
                <a href="doctor-profile.html">Doctor profile</a>
            </li>
        </ul>
    </li>





    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
        <a class="nav-link" href="{{ route('admin.consultant.index') }}">
            <i class="fa fa-fw fa-gear"></i>
            Consultant
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
        <a class="nav-link" href="{{ route('settings_index') }}">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Settings</span>
        </a>
    </li>
    </ul>


<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
