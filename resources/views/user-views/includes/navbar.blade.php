<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3" style="background-color: #3361ff">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
        </div>




        <div class="top-navbar-right ms-auto">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item search-toggle-icon">
                    <a class="nav-link" href="#">
                        <div class="">
                            <i class="bi bi-search"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center">
                            @if (!Auth::user()->pegawai->avatar)
                            <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle" alt=""
                                style="border-radius: 50%">
                            @else
                            <img class="rounded-circle" width="40" height="40"
                                src="{{ asset('/profile/'.Auth::user()->pegawai['avatar']) }}" alt="">
                            @endif

                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    @if (!Auth::user()->pegawai->avatar)
                                    <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle" alt=""
                                        style="border-radius: 50%">
                                    @else
                                    <img class="rounded-circle" width="54" height="54"
                                        src="{{ asset('/profile/'.Auth::user()->pegawai['avatar']) }}" alt="">
                                    @endif

                                    {{-- <img src="{{ url('assets/images/avatars/avatar-1.png') }}" alt=""
                                    class="rounded-circle"
                                    width="54" height="54"> --}}
                                    <div class="ms-3">
                                        <h6 class="mb-0 dropdown-user-name">Halo,
                                            {{ Auth::user()->Pegawai->nama_panggilan }}</h6>
                                        <small
                                            class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->Pegawai->Unitkerja->unit_kerja }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-person-fill"></i></div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('password.index') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-gear-fill"></i></div>
                                    <div class="ms-3"><span>Ganti Password</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="authentication-signup-with-header-footer.html"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <div class="ms  -3"><span>Logout</span></div>
                                </div>
                                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h6 class="mb-0 dropdown-user-name text-white">Halo, {{ Auth::user()->Pegawai->nama_panggilan }}
                    </h6>
                    <small
                        class="mb-0 dropdown-user-designation text-secondary text-white">{{ Auth::user()->Pegawai->Unitkerja->unit_kerja }}</small>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--end top header-->

<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url('assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">PT. Pelindo</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>

    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('profile.index') }}">
                <div class="parent-icon"><i class="lni lni-user"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        @if (Auth::user()->Pegawai->role == 'HRD')
        <li class="menu-label">Data Master</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-database"></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li> <a href="{{ route('pegawai.index') }}"><i class="bi bi-circle"></i>Pegawai</a></li>
                <li> <a href="{{ route('unit-kerja.index') }}"><i class="bi bi-circle"></i>Unit Kerja</a></li>
                <li> <a href="{{ route('jabatan.index') }}"><i class="bi bi-circle"></i>Jabatan</a></li>
                <li> <a href="{{ route('pangkat.index') }}"><i class="bi bi-circle"></i>Pangkat dan Golongan</a></li>
                <li> <a href="{{ route('shift.index') }}"><i class="bi bi-circle"></i>Shift Kerja</a></li>
                <li> <a href="{{ route('pelanggaran.index') }}"><i class="bi bi-circle"></i>Pelanggaran</a></li>
                <li> <a href="{{ route('sanksi.index') }}"><i class="bi bi-circle"></i>Sanksi</a></li>
                <li> <a href="{{ route('orientasi.index') }}"><i class="bi bi-circle"></i>Orientasi</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                <div class="menu-title">Requirement</div>
            </a>
            <ul>
                <li> <a href="{{ route('pengumuman.index') }}"><i class="bi bi-circle"></i>Pengumuman</a></li>
                <li> <a href="{{ route('calon-pegawai.index') }}"><i class="bi bi-circle"></i>Calon Pegawai</a></li>
                <li> <a href="{{ route('calon-pegawai-hasil') }}"><i class="bi bi-circle"></i>Hasil Seleksi</a></li>
                <li> <a href="{{ route('peserta-orientasi.index') }}"><i class="bi bi-circle"></i>Orientasi</a></li>
                <li> <a href="{{ route('web-requirement.index') }}"><i class="bi bi-circle"></i>Menuju Web Recrut</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-blackboard"></i>
                </div>
                <div class="menu-title">Pelatihan</div>
            </a>
            <ul>
                <li> <a href="{{ route('program-pelatihan.index') }}"><i class="bi bi-circle"></i>Program Pelatihan</a>
                </li>
            </ul>
        </li>
        @endif

        <li class="menu-label">Riwayat Pegawai</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-clipboard"></i>
                </div>
                <div class="menu-title">Data Riwayat</div>
            </a>
            <ul>
                <li> <a href="{{ route('keluarga.index') }}"><i class="bi bi-circle"></i>Riwayat Keluarga</a></li>
                <li> <a href="{{ route('pendidikan.index') }}"><i class="bi bi-circle"></i>Riwayat Pendidikan</a></li>
                <li> <a href="{{ route('prestasi.index') }}"><i class="bi bi-circle"></i>Riwayat Prestasi</a></li>
                <li> <a href="{{ route('cuti.index') }}"><i class="bi bi-circle"></i>Riwayat Cuti</a></li>
                <li> <a href="{{ route('riwayatpelanggaran.index') }}"><i class="bi bi-circle"></i>Riwayat Pelanggaran</a></li>
                <li> <a href="{{ route('riwayatsanksi.index') }}"><i class="bi bi-circle"></i>Riwayat Sanksi</a></li>
                {{-- <li> <a href="{{ route('riwayatpelatihan.index') }}"><i class="bi bi-circle"></i>Riwayat
                Pelatihan</a>
        </li> --}}
    </ul>
    </li>

    @if (Auth::user()->Pegawai->role != 'HRD')
    <li class="menu-label">Pelatihan</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-blackboard"></i>
            </div>
            <div class="menu-title">Pelatihan</div>
        </a>
        <ul>
            <li> <a href="{{ route('web-pelatihan.index') }}"><i class="bi bi-circle"></i>Program Pelatihan</a></li>
        </ul>
    </li>
    @endif


    <li class="menu-label">Jadwal dan Absen</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fadeIn animated bx bx-calendar-week"></i>
            </div>
            @if (Auth::user()->Pegawai->role == 'Pegawai')
            <div class="menu-title">Jadwal Saya</div>
            @else
            <div class="menu-title">Penjadwalan</div>
            @endif

        </a>
        <ul>
            @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala Unit')
            <li> <a href="{{ route('jadwal-pegawai.index') }}"><i class="bi bi-circle"></i>Atur Jadwal Pegawai</a></li>
            @endif
            <li> <a href="{{ route('jadwal-saya.index') }}"><i class="bi bi-circle"></i>Jadwal Saya</a></li>
            <li> <a href="{{ route('jadwal-saya.show', Auth::user()->pegawai->id_pegawai) }}"><i class="bi bi-circle"></i>List Penukaran Jadwal</a></li>
        </ul>
    </li>
  

    @if (Auth::user()->Pegawai->role == 'HRD')

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-checkbox"></i>
            </div>
            <div class="menu-title">Absensi</div>
        </a>
        <ul>
            <li> <a href="{{ route('laporan-absensi.index') }}"><i class="bi bi-circle"></i>Laporan Absensi</a>
            <li> <a href="{{ route('absen-manual.index') }}"><i class="bi bi-circle"></i>Absen Pegawai</a>
        </ul>
    </li>
    @endif

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-write"></i>
            </div>
            <div class="menu-title">Cuti</div>
        </a>
        <ul>
            <li> <a href="{{ route('pengajuan-cuti.index') }}"><i class="bi bi-circle"></i>Pengajuan Cuti</a>
        </ul>
    </li>
    @if (Auth::user()->Pegawai->role == 'Pegawai')
    <li class="menu-label">Penilaian</li>
    @else
    <li class="menu-label">Penilaian dan Pelanggaran</li>
    @endif

    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-certificate"></i>
            </div>
            <div class="menu-title">Penilaian Pegawai</div>
        </a>
        <ul>
            @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala Unit')
            <li> <a href="{{ route('penilaian-pegawai.index') }}"><i class="bi bi-circle"></i>Penilaian</a></li>
            @endif
            <li> <a href="{{ route('nilai-saya.index') }}"><i class="bi bi-circle"></i>Nilai Saya</a></li>
        </ul>
    </li>
    @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala Unit')
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-ban"></i>
            </div>
            <div class="menu-title">Pelanggaran</div>
        </a>
        <ul>
            <li> <a href="{{ route('pelanggaran-pegawai.index') }}"><i class="bi bi-circle"></i>Pelanggaran</a></li>
        </ul>
    </li>
    @endif
    @if (Auth::user()->Pegawai->role == 'HRD')
    <li class="menu-label">Menu Approval</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-checkmark"></i></i>
            </div>
            <div class="menu-title">Approval</div>
        </a>
        <ul>
            <li> <a href="{{ route('approval-cuti.index') }}"><i class="bi bi-circle"></i>Approval Cuti</a>
            <li> <a href="{{ route('approval-penilaian.index') }}"><i class="bi bi-circle"></i>Approval Penilaian</a>
            </li>

        </ul>
    </li>
    @endif




    <li class="menu-label">Logout</li>
    <li>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
            <div class="parent-icon"><i class="fadeIn animated bx bx-arrow-back"></i>
            </div>
            <div class="menu-title">Logout</div>
            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </a>

    </li>
    </ul>
</aside>
