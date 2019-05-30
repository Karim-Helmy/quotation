<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="/" title="{{ getLanguageValue('Quotation Management System') }}">
                    <img src="/images/Corpy-Core-Logo-011.png" alt="">
                    </a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <ul id="top_access">
                    @if (Auth::check())
                    <li>
                        <a href="{{ route('profile.myProfile') }}" title="{{ getLanguageValue('Profile') }}">
                            <i class="pe-7s-user"></i>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-reomve" title="{{ getLanguageValue('Logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a></li>
                    <li><a href="{{ route('register') }}"><i class="pe-7s-add-user"></i></a></li>
                    @endif
                </ul>
                @if(Auth::check())
                <div class="main-menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">
                                    Add Quotation
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

                <!-- /main-menu -->
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
