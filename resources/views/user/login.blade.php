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
    <link rel="stylesheet" href="{{ asset('adm/assets/css/styles.css') }}" />

    <title>Masuk - Voting Online Ketua Osis</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('smk.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper" class="auth-customizer-none">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center" >
            <div class="d-flex align-items-center justify-content-center w-100" >
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a class="text-nowrap logo-img text-center d-block mb-5 w-100 " style="width: 35%">
                                    <img src="{{ asset('smk.png') }}" class="dark-logo" alt="Logo-Dark" style="width: 35%" />
                                    {{-- <img src="{{ asset('smk.png') }}" class="light-logo" alt="Logo-light" /> --}}
                                </a>
                                <h2 align="center">Masuk</h4>
                                <p>Masuk menggunakan akun yang sudah admin berikan!</p>
                                @if (session('error'))
                                        <div class="alert alert-danger text-white">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nis</label>
                                        <input type="text" inputmode="numeric" pattern="[0-9]*" class="form-control"
                                            name="nis" placeholder="Masukan Nis">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="Masukan Password" placeholder="Masukan Password">
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-2"
                                        type="submit">Masuk</button>
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
