<header class="header">
    <div style="display: flex; align-items: center;">
        <button class="sidebar-toggler" id="sidebar-toggler" type="button">
            <i class="bi bi-list"></i>
        </button>
        <h1 class="header-title">@yield('title')</h1>
    </div>

    <div class="header-user-menu">
        @auth
            <span class="header-user-name d-none d-sm-block">
                Halo, <strong>{{ Auth::user()->name }}</strong>
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="logout-text d-none d-sm-inline ms-1">Logout</span>
                </button>
            </form>
        @endauth
    </div>
</header>