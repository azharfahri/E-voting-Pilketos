<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shared on THEMELOCK.COM - Dastyle - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jvectormap -->
    <link href="{{ asset('adm/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset('adm/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adm/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adm/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="dark-sidenav">
    <!-- Left Sidenav -->
    @include('layouts.components.sidebar')
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            @include('layouts.components.navbar')
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- Page Content-->

        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->




    <!-- jQuery  -->
    <script src="{{ asset('adm/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/waves.js') }}"></script>
    <script src="{{ asset('adm/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/moment.js') }}"></script>
    <script src="{{ asset('adm/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('adm/plugins/apex-charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adm/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('adm/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('adm/assets/pages/jquery.analytics_dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('adm/assets/js/app.js') }}"></script>
@stack('scripts')
</body>

</html>
