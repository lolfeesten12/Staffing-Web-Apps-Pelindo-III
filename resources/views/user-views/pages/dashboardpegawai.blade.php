@extends('user-views.layouts.app')


@section('name')
Dashboard Pegawai
@endsection

@section('content')

<main class="page-content">
    <div class="col py-2">
        <div class="card radius-15">
            <div class="card-body">
                <div class="float-end text-muted">{{ $haritext }}</div>
                <h4 class="card-title text-primary">Selamat Datang, {{ Auth::user()->Pegawai->nama_pegawai }}</h4>
                <p class="card-text">Selamat Bekerja!Amanah, Kompeten, Harmonis, Loyal Adaptif dan Kolaboratif. 
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
                            <p class="mb-1 text-white">Unit Kerja Anda</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->UnitKerja->unit_kerja }}</h5>
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
                            <p class="mb-1 text-white">Sub Unit Kerja Anda</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->SubUnit->nama_sub_unit }}</h5>
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
                            <p class="mb-1 text-white">Jabatan Anda</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->Jabatan->nama_jabatan }}</h5>
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
                            <p class="mb-1 text-white">Pangkat Anda</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->Pangkat->nama_pangkat }}, {{ Auth::user()->Pegawai->Pangkat->golongan }}</h5>
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
                            <p class="mb-1">Jadwal Anda Hari Ini</p>
                            <h5 class="mb-0 text-info">Shift {{ $jadwal_today[0]->ShiftKerja->jenis_shift }}</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-bell"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Jam Masuk {{ $jadwal_today[0]->ShiftKerja->jam_masuk }} - Jam Keluar {{ $jadwal_today[0]->ShiftKerja->jam_selesai }}</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Pelatihan Wajib Diikuti</p>
                            <h5 class="mb-0 text-info">{{ $jumlah_pelatihan_wajib }} Pelatihan</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-briefcase"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i><span>Cek Pada Laman Pelatihan</span> </small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Mutasi Anda</p>
                            <h5 class="mb-0 text-info">{{ $mutasi }} Data</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Cek Pada Laman Riwayat Mutasi</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Penilaian Kinerja</p>
                            <h5 class="mb-0 text-info">{{ $nilai }} Nilai Disahkan</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-users"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Cek Pada Laman Penilaian</span></small>
                </div>
            </div>
        </div>
    </div>

    {{-- CUTI --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Data Cuti Diproses</p>
                            <h5 class="mb-0 text-info">{{ $cuti_proses }} Data</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-bell"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Cek Pada Laman Pengajuan Cuti</span></small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Data Cuti Diterima</p>
                            <h5 class="mb-0 text-info">{{ $cuti_terima }} Data</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="lni lni-briefcase"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i><span>Cek Pada Laman Pengajuan Cuti</span> </small>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Data Cuti Ditolak</p>
                            <h5 class="mb-0 text-info">{{ $cuti_tolak }} Data</h5>
                        </div>
                        <div class="ms-auto fs-2 text-primary">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <hr class="my-2">
                    <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Cek Pada Laman Pengajuan Cuti</span></small>
                </div>
            </div>
        </div>
        @if (count($jadwal) > 0)
            <div class="col">
                <div class="card bg-danger radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1 text-white">Penukaran Jadwal</p>
                                <h5 class="mb-0 text-white">{{ $tukarjadwal }} Penukaran jadwal</h5> 
                            </div>
                            <div class="ms-auto fs-2 text-white">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <hr class="my-2">
                        <a type="button" href="{{ route('jadwal-saya.show', Auth::user()->pegawai->id_pegawai) }}" class="btn btn-danger btn-sm">Cek Disini Sekarang!</a>
                    </div>
                </div>
            </div>
        @else
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1 text-white">Penukaran Jadwal</p>
                                <h5 class="mb-0 text-info">Tidak ada Penukaran</h5> 
                            </div>
                            <div class="ms-auto fs-2 text-primary">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <hr class="my-2">
                        <small class="mb-0"><i class="bi bi-arrow-up"></i> <span>Cek Pada Laman Jadwal</span></small>
                    </div>
                </div>
            </div>
        
        
        @endif
                          
    </div>

    {{-- @if (count($jadwal) > 0)
    <div class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-danger"><i class="bi bi-info-circle-fill"></i>
            </div>
            <div class="ms-3">
                <div class="text-danger">Terdapat Penukaran Jadwal, Lihat Sekarang!</div>
            </div>
            <a type="button" href="{{ route('jadwal-saya.show', Auth::user()->pegawai->id_pegawai) }}" class="btn btn-danger" style="margin-left: 900px">Lihat Penukaran <span class="badge bg-dark">{{ $tukarjadwal }} Data</span>
            </a>
        </div>               
    </div>
    @else
    @endif --}}


</main>
@endsection
