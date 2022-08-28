<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="account-dropdown__footer">
                                    <a id='home-client' href="{{ url('/') }}"><i class="zmdi zmdi-home"></i>Home client</a>
                                </div>
                                <div class="account-dropdown__footer">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a id='logout' href="#"><i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>