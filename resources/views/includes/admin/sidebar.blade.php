<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">
                Dashboard
            </span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
        <a class="nav-link" href="{{ route('faq.index') }}">
            <i class="fa fa-comments-o"></i>
            <span class="nav-link-text">
                Faq
            </span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
        <a class="nav-link" href="bookmarks.html">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Bookmarks</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
        <a class="nav-link" href="add-listing.html">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Add listing</span>
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

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Languages</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <li>
                <a href="{{ route('languages_index') }}">Languages</a>
            </li>
            <li>
                <a href="{{ route('languages_labels') }}">Labels</a>
            </li>
        </ul>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-video-camera"></i>
            <span class="nav-link-text">Videos</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li>
                <a href="{{ route('videos.index') }}">Vidoes</a>
            </li>
            <li>
                <a href="{{ route('diseases-categories.index') }}">Diseases Categories</a>
            </li>
        </ul>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components" >
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCountries" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Countries</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseCountries" >
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing"><a href="{{ route('countries.index') }}">{{trans('admin.allcountries')}}</a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing" ><a href="{{ route('countries.create') }}">{{trans('admin.addcountries')}}</a>
            </li>
        </ul>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fa fa-fw fa-shopping-bag"></i>
            Drugs
        </a>
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
