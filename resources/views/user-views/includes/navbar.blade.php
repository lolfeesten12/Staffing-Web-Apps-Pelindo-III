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
                        @if (Auth::user()->Pegawai->id_jabatan == '10' || Auth::user()->Pegawai->id_jabatan == '9' )
                        <li>
                            <button class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#ModalPindahRoleHRD">
                               <div class="d-flex align-items-center">
                                 <div class=""><i class="bi bi-gear-fill"></i></div>
                                 <div class="ms-3"><span>Ganti Role</span></div>
                               </div>
                             </button>
                          </li>
                        @endif

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
            @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Direktur' || Auth::user()->Pegawai->role == 'Kepala HRD')
                <a href="{{ route('dashboard') }}">
                    <div class="parent-icon"><i class="lni lni-home"></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            @elseif (Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit')
            <a href="{{ route('dashboardunit') }}">
                <div class="parent-icon"><i class="lni lni-home"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            @elseif (Auth::user()->Pegawai->role == 'Pegawai')
            <a href="{{ route('dashboardpegawai') }}">
                <div class="parent-icon"><i class="lni lni-home"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            @endif
        </li>
        <li>
            <a href="{{ route('profile.index') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD')
        <li class="menu-label">Data Master</li>
        @endif
     
        @if (Auth::user()->Pegawai->role == 'Direktur' || Auth::user()->Pegawai->role == 'Kepala HRD')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-database"></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li> <a href="{{ route('pegawai.index') }}"><i class="bi bi-circle"></i>Pegawai</a></li>
                <li> <a href="{{ route('unit-kerja.index') }}"><i class="bi bi-circle"></i>Unit Kerja</a></li>
                <li> <a href="{{ route('sub-unit.index') }}"><i class="bi bi-circle"></i>Sub Unit Kerja</a></li>
                <li> <a href="{{ route('jabatan.index') }}"><i class="bi bi-circle"></i>Jabatan</a></li>
                <li> <a href="{{ route('pangkat.index') }}"><i class="bi bi-circle"></i>Pangkat dan Golongan</a></li>
                <li> <a href="{{ route('shift.index') }}"><i class="bi bi-circle"></i>Shift Kerja</a></li>
                <li> <a href="{{ route('pelanggaran.index') }}"><i class="bi bi-circle"></i>Pelanggaran</a></li>
                <li> <a href="{{ route('sanksi.index') }}"><i class="bi bi-circle"></i>Sanksi</a></li>
                <li> <a href="{{ route('orientasi.index') }}"><i class="bi bi-circle"></i>Orientasi</a></li>
                <li> <a href="{{ route('penempatan.index') }}"><i class="bi bi-circle"></i>Penempatan</a></li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->Pegawai->role == 'Direktur')
            <li class="menu-label">Pelaporan</li>
        @endif
        @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Direktur')
        
       
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                @if (Auth::user()->Pegawai->role == 'Direktur')
                    <div class="menu-title">Pengadaan Pegawai</div>
                @else
                <div class="menu-title">Requirement</div>
                @endif
                
            </a>
            <ul>
                <li> <a href="{{ route('pengumuman.index') }}"><i class="bi bi-circle"></i>Lowongan</a></li>
                @if (Auth::user()->Pegawai->role != 'Direktur')
                    <li> <a href="{{ route('calon-pegawai.index') }}"><i class="bi bi-circle"></i>Calon Pegawai</a></li>
                @endif
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

        @if (Auth::user()->Pegawai->role != 'Direktur')
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
                <li> <a href="{{ route('mutasi.pegawai') }}"><i class="bi bi-circle"></i>Riwayat Mutasi</a>     
            </ul>
        </li>
        @endif
     

    @if (Auth::user()->Pegawai->role != 'Kepala HRD' && Auth::user()->Pegawai->role != 'Direktur')
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

    @if (Auth::user()->Pegawai->role != 'Direktur')
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
            @if (Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role =='Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit')
            <li> <a href="{{ route('jadwal-pegawai.index') }}"><i class="bi bi-circle"></i>Atur Jadwal Pegawai</a></li>
            @endif
            <li> <a href="{{ route('jadwal-saya.index') }}"><i class="bi bi-circle"></i>Jadwal Saya</a></li>
            <li> <a href="{{ route('jadwal-saya.show', Auth::user()->pegawai->id_pegawai) }}"><i class="bi bi-circle"></i>List Penukaran Jadwal</a></li>
        </ul>
    </li>
    @endif

    
    @if (Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Direktur')
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-checkbox"></i>
            </div>
            <div class="menu-title">Absensi</div>
        </a>
        <ul>
            <li> <a href="{{ route('laporan-absensi.index') }}"><i class="bi bi-circle"></i>Laporan Absensi</a>
            @if (Auth::user()->Pegawai->role != 'Direktur')
            <li> <a href="{{ route('absen-manual.index') }}"><i class="bi bi-circle"></i>Absen Pegawai</a>
            @endif
           
        </ul>
    </li>
    @endif

    @if (Auth::user()->Pegawai->role != 'Direktur')
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
    @endif

    @if (Auth::user()->Pegawai->role !='Direktur')
    <li class="menu-label">Mutasi</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-briefcase"></i>
            </div>
            <div class="menu-title">Mutasi Pegawai</div>
        </a>
        <ul>
            @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit')
            <li> <a href="{{ route('usulan-mutasi.index') }}"><i class="bi bi-circle"></i>Usulan Mutasi</a>
            @else
            <li> <a href="{{ route('usulan-mutasi.index') }}"><i class="bi bi-circle"></i>Resign</a>
            @endif
            @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit')
                
                <li> <a href="{{ route('usulan-pangkat.index') }}"><i class="bi bi-circle"></i>Usulan Mutasi Pangkat</a>
                <li> <a href="{{ route('usulan-jabatan.index') }}"><i class="bi bi-circle"></i>Usulan Mutasi Jabatan</a>
            @endif
            @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD')
                <li> <a href="{{ route('mutasi.index') }}"><i class="bi bi-circle"></i>Mutasi</a>
                <li> <a href="{{ route('mutasi-pangkat.index') }}"><i class="bi bi-circle"></i>Mutasi Pangkat</a>
                <li> <a href="{{ route('mutasi-jabatan.index') }}"><i class="bi bi-circle"></i>Mutasi Jabatan</a>
            @endif  
                
            
        </ul>
    </li>
    @endif
  
  


    @if (Auth::user()->Pegawai->role == 'Pegawai')
    <li class="menu-label">Penilaian</li>
    @elseif (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD')
    <li class="menu-label">Penilaian dan Pelanggaran</li>
    @elseif (Auth::user()->Pegawai->role == 'Direktur')
    
    @endif

    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-certificate"></i>
            </div>
            <div class="menu-title">Penilaian Pegawai</div>
        </a>
        <ul>
            <li> <a href="{{ route('penilaian-diri.index') }}"><i class="bi bi-circle"></i>Penilaian Diri</a></li>
            @if (Auth::user()->Pegawai->role == 'Pegawai' || Auth::user()->Pegawai->role == 'HRD')
        
            @else
            <li> <a href="{{ route('penilaian-pegawai.index') }}"><i class="bi bi-circle"></i>Penilaian Pegawai</a></li>
            @endif
           
          
        </ul>
    </li>
    @if (Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Direktur')
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
    
    @if (Auth::user()->Pegawai->role == 'Kepala HRD' || Auth::user()->Pegawai->role == 'Direktur')
    <li class="menu-label">Menu Approval</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="lni lni-checkmark"></i></i>
            </div>
            <div class="menu-title">Approval</div>
        </a>
        <ul>
            @if (Auth::user()->Pegawai->role =='Kepala HRD')
                <li> <a href="{{ route('approval-cuti.index') }}"><i class="bi bi-circle"></i>Approval Cuti</a>
            @elseif (Auth::user()->Pegawai->role == 'Direktur')
                <li> <a href="{{ route('approval-mutasi.index') }}"><i class="bi bi-circle"></i>Mutasi</a>
                <li> <a href="{{ route('approval-mutasi-pangkat.index') }}"><i class="bi bi-circle"></i>Mutasi Pangkat</a>
                <li> <a href="{{ route('approval-mutasi-jabatan.index') }}"><i class="bi bi-circle"></i>Mutasi Jabatan</a>
            @endif
        </ul>
    </li>
    @endif

    @if (Auth::user()->Pegawai->role == 'Direktur' || Auth::user()->Pegawai->role == 'Direktur Unit' || Auth::user()->Pegawai->role == 'Manager Unit')
    <li class="menu-label">Pengesahan Nilai</li>
    <li>
        <a href="{{ route('approval-penilaian.index') }}">
          <div class="parent-icon"><i class="lni lni-checkmark-circle"></i>
          </div>
          <div class="menu-title">Pengesahan Nilai</div>
        </a>
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

<div class="modal fade" id="ModalPindahRoleHRD" data-backdrop="static" tabindex="-1" role="dialog"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ganti Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('pindah-role') }}" method="POST">
            @csrf
            <div class="modal-body">
                <select class="form-select" aria-label="Default select example" name="role" type="text" id="role" required>
                    <option selected="{{ Auth::user()->Pegawai->role }}">{{ Auth::user()->Pegawai->role }}</option>
                    <option value="HRD">HRD</option>
                    <option value="Direktur">Direktur</option>
                    <option value="Direktur Unit">Direktur Unit</option>
                    <option value="Kepala HRD">Kepala HRD</option>
                    <option value="Kepala Unit">Kepala Unit</option>
                    <option value="Manager Unit">Manager Unit</option>
                    <option value="Pegawai">Pegawai</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Ganti Role</button>
            </div>
        </form>
    </div>
</div>
</div>
