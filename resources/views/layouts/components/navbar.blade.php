<nav class="navbar-custom">
    <ul class="list-unstyled topbar-nav float-right mb-0">



        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->nama }}</span>
                <i class="mdi mdi-account-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul><!--end topbar-nav-->

    <ul class="list-unstyled topbar-nav mb-0">
        <li>
            <button class="nav-link button-menu-mobile">
                <i data-feather="menu" class="align-self-center topbar-icon"></i>
            </button>
        </li>
    </ul>
</nav>
