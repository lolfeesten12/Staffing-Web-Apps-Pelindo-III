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
                            <img src="{{ url('assets/images/avatars/avatar-1.png') }}" class="user-img" alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <img src="{{ url('assets/images/avatars/avatar-1.png') }}" alt="" class="rounded-circle"
                                        width="54" height="54">
                                    <div class="ms-3">
                                        <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                                        <small class="mb-0 dropdown-user-designation text-secondary text-white">HR
                                            Manager</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages-user-profile.html">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-person-fill"></i></div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
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
                            <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <div class="ms  -3"><span>Logout</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                <h6 class="mb-0 dropdown-user-name text-white">Jhon Deo</h6>
                <small class="mb-0 dropdown-user-designation text-secondary text-white">HR
                    Manager</small>
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
            <a href="https://codervent.com/skodash/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="lni lni-user"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        <li>
            <a href="https://codervent.com/skodash/documentation/index.html" target="_blank">
                <div class="parent-icon"> <i class="lni lni-home"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
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
                <li> <a href="index2.html"><i class="bi bi-circle"></i>Shift Kerja</a></li>
                <li> <a href="index2.html"><i class="bi bi-circle"></i>Unit Kerja</a></li>
            </ul>
        </li>
        <li class="menu-label">Riwayat Pegawai</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-clipboard"></i>
                </div>
                <div class="menu-title">Data Riwayat</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Riwayat Keluarga</a></li>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Riwayat Pendidikan</a></li>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Riwayat Prestasi</a></li>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Riwayat Cuti</a></li>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Riwayat Pelanggaran</a></li>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Riwayat Sanksi</a></li>
            </ul>
        </li>
        <li class="menu-label">Jadwal dan Absen</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-calendar-week"></i>
                </div>
                <div class="menu-title">Penjadwalan</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html"><i class="bi bi-circle"></i>Jadwal Pegawai</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-checkbox"></i>
                </div>
                <div class="menu-title">Absensi</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products-list.html"><i class="bi bi-circle"></i>Absensi</a>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-write"></i>
                </div>
                <div class="menu-title">Cuti</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products-list.html"><i class="bi bi-circle"></i>Pengajuan Cuti</a>
                    <li> <a href="ecommerce-products-list.html"><i class="bi bi-circle"></i>Approval Cuti</a>
            </ul>
        </li>
        <li class="menu-label">Penilaian dan Pelanggaran</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="lni lni-certificate"></i>
                </div>
                <div class="menu-title">Penilaian Pegawai</div>
            </a>
            <ul>
                <li> <a href="form-elements.html"><i class="bi bi-circle"></i>Penilaian</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="lni lni-ban"></i>
                </div>
                <div class="menu-title">Pelanggaran</div>
            </a>
            <ul>
                <li> <a href="table-basic-table.html"><i class="bi bi-circle"></i>Pelanggaran</a></li>
                <li> <a href="table-advance-tables.html"><i class="bi bi-circle"></i>Sanksi</a></li>
            </ul>
        </li>
        <li class="menu-label">Logout</li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="fadeIn animated bx bx-arrow-back"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
    </ul>
</aside>
