<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="dashboard/crm-index.html" class="logo">
            <span>
                <img src="{{ asset('adm/assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="{{ asset('adm/assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('adm/assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="home" class="align-self-center menu-icon"></i>
                    <span>Dashboard</span>
            </li>

            <li>
                <a href="javascript: void(0);"><i data-feather="grid"
                        class="align-self-center menu-icon"></i><span>Data</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.jurusan.index') }}"><i
                                class="ti-control-record"></i>Jurusan</a></li>

                </ul>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.kelas.index') }}"><i
                                class="ti-control-record"></i>Kelas</a></li>

                </ul>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.periode.index') }}"><i
                                class="ti-control-record"></i>Periode</a></li>

                </ul>
            </li>
        </ul>

    </div>
</div>
