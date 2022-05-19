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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    @include('sweetalert::alert')
</head>

<body class="bg-surface  pace-done" data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="">
    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99"
            style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="wrapper">
        @include('user-views.pages.requirement.webrequirement.layout.navbarwebreq')

        @yield('content')

    </div>



    <footer class="bg-white border-top p-3 text-center fixed-bottom mt-10">
        <p class="mb-0">Copyright © 2022. PT. Pelabuhan Indonesia.</p>
    </footer>

    </div>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    
    <script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/js/pace.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/js/table-datatable.js') }}"></script>
    <!--app-->
    <script src="{{ url('assets/js/app.js') }}"></script>
    <script>
        mendeleyWebImporter = {
            downloadPdfs(e, t) {
                return this._call('downloadPdfs', [e, t]);
            },
            open() {
                return this._call('open', []);
            },
            setLoginToken(e) {
                return this._call('setLoginToken', [e]);
            },
            _call(methodName, methodArgs) {
                const id = Math.random();
                window.postMessage({
                    id,
                    token: '0.632911116531687',
                    methodName,
                    methodArgs
                }, 'https://codervent.com');
                return new Promise(resolve => {
                    const listener = window.addEventListener('message', event => {
                        const data = event.data;
                        if (typeof data !== 'object' || !('result' in data) || data.id !== id)
                            return;
                        window.removeEventListener('message', listener);
                        resolve(data.result);
                    });
                });
            }
        };

    </script>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>
