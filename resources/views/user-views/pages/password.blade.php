<!doctype html>
<html lang="en" class="light-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('assets/images/logo.png') }}" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css" rel="stylesheet">
    <link href="{{ url('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" /> --}}
    <link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/header-colors.css') }}" rel="stylesheet" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{-- <script src="{{ url('/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Ganti Password</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            @if(session('messageberhasil'))
            <div class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2 mb-5">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="text-success"> {{ session('messageberhasil') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('messagegagal'))
            <div class="alert border-0 border-warning border-start border-4 bg-light-warning alert-dismissible fade show py-2 mb-5">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-warning"><i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="text-warning"> {{ session('messagegagal') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                                <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Generate New Password</h5>
                                    <p class="card-text mb-5">Masukkan Password Baru!</p>
                                    <form class="form-body" action="{{ route('password.store') }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputNewPassword" class="form-label">New Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control radius-30 ps-5" id="inputNewPassword" placeholder="Enter New Password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control radius-30 ps-5" id="inputConfirmPassword" placeholder="Confirm Password" name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid gap-3">
                                                    <button type="submit" class="btn btn-primary radius-30">Ganti Password</button>
                                                    <button type="submit" class="btn btn-light radius-30">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>

    <script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/js/pace.min.js') }}"></script>


</body>

</html>
