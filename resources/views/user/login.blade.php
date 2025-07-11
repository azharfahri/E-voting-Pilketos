


<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('adm/assets/images/logos/favicon.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('adm/assets/css/styles.css') }}" />

    <title>Modernize Bootstrap Admin</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('adm/assets/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper" class="auth-customizer-none">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#"
                                    class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="{{ asset('adm/assets/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                                    <img src="{{ asset('adm/assets/images/logos/light-logo.svg') }}" class="light-logo"
                                        alt="Logo-light" />
                                </a>
                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nis</label>
                                        <input type="text" class="form-control" name="nis" placeholder="Masukan Nis">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="Masukan Password">
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" type="submit">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
    <script src="{{ asset('adm/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adm/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('adm/assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('adm/assets/js/theme/app.min.js') }}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
