<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('smk.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('adm/assets/css/styles.css') }} "/>

    <title>E-Voting ketua osis</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('adm/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('smk.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @include('layouts.components.sidebar')
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            @include('layouts.components.navbar')
            <!--  Header End -->



            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('adm/assets/js/vendor.min.js')}}"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('adm/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('adm/assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{ asset('adm/assets/js/theme/app.init.js')}}"></script>
    <script src="{{ asset('adm/assets/js/theme/theme.js')}}"></script>
    <script src="{{ asset('adm/assets/js/theme/app.min.js')}}"></script>
    <script src="{{ asset('adm/assets/js/theme/sidebarmenu.js')}}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('adm/assets/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('adm/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{ asset('adm/assets/js/dashboards/dashboard.js')}}"></script>


@stack('scripts')
</body>

</html>
