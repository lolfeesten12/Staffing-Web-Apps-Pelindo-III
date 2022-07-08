@extends('user-views.layouts.app')


@section('name')
Dashboard
@endsection

@section('content')

<main class="page-content">
    <div class="col py-2">
        <div class="card radius-15">
            <div class="card-body">
                <div class="float-end text-muted">{{ $haritext }}</div>
                <h4 class="card-title text-primary">Selamat Datang, {{ Auth::user()->Pegawai->nama_pegawai }}</h4>
                <p class="card-text">Halaman dashboard menampilkan poin-poin penting mengenai kepegawaian pada aplikasi.
                </p>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Total Pegawai</p>
                            <h5 class="mb-0 text-white">{{ $jumlah_pegawai }} Orang</h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Jumlah Divisi / Unit Kerja</p>
                            <h5 class="mb-0 text-white">{{ $jumlah_unit }} Divisi</h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-consulting"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Jumlah Jabatan</p>
                            <h5 class="mb-0 text-white">{{ $jumlah_jabatan }} Jabatan</h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-briefcase"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Jumlah Shift Kerja</p>
                            <h5 class="mb-0 text-white">{{ $jumlah_shift_kerja }} Shift</h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-briefcase"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Orientasi Belum Terlaksana</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_orientasi_belum }} Periode</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-bell"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>+{{ $jumlah_orientasi_telah }} Periode Orientasi Telah Terlaksana</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Pelatihan Aktif</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_pelatihan_aktif }} Pelatihan</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-briefcase"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>+{{ $jumlah_pelatihan_wajib }}Pelatihan Wajib Terhitung</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Lowongan Aktif</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_lowongan }} Lowongan</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>+{{ $jumlah_lowongan_hari }} Lowongan Bertambah Hari ini</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Calon Pelamar</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_pelamar }} Pelamar</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-users"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>+{{ $jumlah_pelamar_hari }} Pelamar Tercatat Hari ini</span></small>
                </div>
            </div>
        </div>
    </div>

    {{-- APPROVAL --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10">
                @if (Auth::user()->Pegawai->role == 'Direktur')
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Pengajuan Mutasi Internal</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_cuti }} Orang</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-graph"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                        <small class="mb-0"><span>Total Data Cuti Bulan ini</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Pending +{{ $jumlah_cuti_pending }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Approved +{{ $jumlah_cuti_terima }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Not Approved +{{ $jumlah_cuti_tolak }}</span></small>
                </div>
                @else
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Pengajuan Cuti</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_cuti }} Orang</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-graph"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                        <small class="mb-0"><span>Total Data Cuti Bulan ini</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Pending +{{ $jumlah_cuti_pending }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Approved +{{ $jumlah_cuti_terima }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Not Approved +{{ $jumlah_cuti_tolak }}</span></small>
                </div>
                @endif
              
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Pengajuan Promosi</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_orientasi_belum }} Orang</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-graph"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                        <small class="mb-0"><span>Total Data Promosi Bulan ini</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Pending +{{ $jumlah_orientasi_telah }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Approved +{{ $jumlah_orientasi_telah }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Not Approved +{{ $jumlah_orientasi_telah }}</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Pengajuan Demosi</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_orientasi_belum }} Orang</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-graph"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                        <small class="mb-0"><span>Total Data Demosi Bulan ini</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Pending +{{ $jumlah_orientasi_telah }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Approved +{{ $jumlah_orientasi_telah }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Not Approved +{{ $jumlah_orientasi_telah }}</span></small>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Pengajuan Resign</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_orientasi_belum }} Orang</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-graph"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                        <small class="mb-0"><span>Total Data Resign Bulan ini</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Pending +{{ $jumlah_orientasi_telah }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Approved +{{ $jumlah_orientasi_telah }}</span></small><br>
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Not Approved +{{ $jumlah_orientasi_telah }}</span></small>
                </div>
            </div>
        </div>
    </div>



</main>
@endsection
