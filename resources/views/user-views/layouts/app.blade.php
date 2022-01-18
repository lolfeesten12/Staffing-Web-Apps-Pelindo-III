<!DOCTYPE html>
<html lang="en" class="light-theme">
<!--begin::Head-->

<head>
    <title>
        @yield('name')
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />

    {{-- style --}}
    @stack('prepend-style')
    @include('user-views.includes.style')
    @stack('addon-style')

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
    @include('user-views.includes.script')
    @stack('addon-script')
    

</body>
<!--end::Body-->

</html>
