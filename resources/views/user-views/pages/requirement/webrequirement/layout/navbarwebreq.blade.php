<nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
    <div class="container">
        <a class="navbar-brand" href="#">
            <div>
                <img src="http://sistem-kepegawaian-pelindo.local:8000/assets/images/logo.png" width="40"
                    class="logo-icon" alt="logo icon">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web-requirement.index') }}">Lowongan Pekerjaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web-pelatihan.index') }}">Program Pelatihan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">Contact Us</a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        English
                    </a>
                </li>
            </ul>
            <div class="d-flex ms-3 gap-3">
                @if (Auth::check() == true)
                    Hallo {{ Auth::user()->Pegawai->nama_panggilan }}
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-4 radius-30">Login Sistem
                        Admin</a>
                @endif
              
            </div>
        </div>
    </div>
</nav>
