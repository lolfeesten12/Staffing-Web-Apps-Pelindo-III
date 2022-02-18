<!DOCTYPE html>
<html lang="en" class="light-theme">
<!--begin::Head-->

<head>
    <title>
        @yield('name')
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('assets/images/logo.png') }}" type="image/png" />
    <link href="{{ url('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/header-colors.css') }}" rel="stylesheet" />
    @include('sweetalert::alert')
    
    {{-- @stack('prepend-style')
    @include('user-views.includes.style')
    @stack('addon-style') --}}

</head>
<!--end::Head-->

<!--begin::Body-->

<body >
    <div class="wrapper">
    
    @include('user-views.includes.navbar')

    @yield('content')

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    </div>

    @stack('prepend-script')
    {{-- @include('user-views.includes.script') --}}
    @stack('addon-script')
    
  <!-- Bootstrap bundle JS -->
  <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
  <!--plugins-->
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ url('assets/js/pace.min.js') }}"></script>
  <script src="{{ url('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ url('assets/js/table-datatable.js') }}"></script>
  <!--app-->
  <script src="{{ url('assets/js/app.js') }}"></script>
</body>
<!--end::Body-->

</html>
