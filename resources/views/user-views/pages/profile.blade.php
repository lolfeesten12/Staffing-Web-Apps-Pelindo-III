@extends('user-views.layouts.app')


@section('name')
Profile
@endsection

@section('content')
@if (session('absenkeluar'))
<script type="text/javascript">
    $(window).on('load', function () {
        $('#absenkeluar').modal('show');
    });

</script>
@endif

@if (session('absenmasuk'))
<script type="text/javascript">
    $(window).on('load', function () {
        $('#absenmasuk').modal('show');
    });

</script>
@endif

<main class="page-content">

    <!-- Modal -->
    <div class="modal fade" id="absenmasuk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="authentication-card">
                            <div class="card shadow rounded-0 overflow-hidden">
                                <div class="row g-0">

                                    <div class="col-lg-12">
                                        <div class="card-body p-4 p-sm-5">
                                            <h5 class="card-title">Absensi Masuk</h5>
                                            <p class="card-text mb-5">
                                                <h1 id="time"></h1>
                                                <form class="form-body" action="{{ route('absen.store') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id_jadwal"
                                                        value="{{ session('absenmasuk') }}"
                                                        class="form-control @error('nama_pegawai') is-invalid @enderror">
                                                    <input type="hidden" name="tipe" value="masuk"
                                                        class="form-control @error('nama_pegawai') is-invalid @enderror">

                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="d-grid gap-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary radius-30">Absen</button>
                                                                <button type="button" data-bs-dismiss="modal"
                                                                    class="btn btn-light radius-30">Kembali</button>
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
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="absenkeluar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="authentication-card">
                            <div class="card shadow rounded-0 overflow-hidden">
                                <div class="row g-0">

                                    <div class="col-lg-12">
                                        <div class="card-body p-4 p-sm-5">
                                            <h5 class="card-title">Absensi Keluar</h5>
                                            <p class="card-text mb-5">
                                                <h1 id="time"></h1>
                                                <form class="form-body" action="{{ route('absen.store') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id_absensi"
                                                        value="{{ session('absenkeluar') }}"
                                                        class="form-control @error('nama_pegawai') is-invalid @enderror">
                                                    <input type="hidden" name="tipe" value="keluar"
                                                        class="form-control @error('nama_pegawai') is-invalid @enderror">

                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="d-grid gap-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary radius-30">Absen</button>
                                                                <button type="button" data-bs-dismiss="modal"
                                                                    class="btn btn-light radius-30">Kembali</button>
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
                </div>
            </div>
        </div>
    </div>
    @if(session('tidakmasuk'))
    <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2 mb-5 ">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="ms-3">
                <div class="text-danger">Maaf Anda Tidak Masuk Hari Ini Karena {{ session('tidakmasuk') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('tidakjadwal'))
    <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2 mb-5 ">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="ms-3">
                <div class="text-danger">Maaf Anda Tidak Memiliki Jadwal Hari Ini</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('sudahkeluar'))
    <div class="alert border-0 bg-light-info alert-dismissible fade show py-2 mb-5">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
            </div>
            <div class="ms-3">
                <div class="text-info">Anda Sudah Absen Keluar Jam {{ session('sudahkeluar') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('masuk'))
    <div class="alert border-0 bg-light-success alert-dismissible fade show py-2 mb-5">
        <div class="d-flex align-items-center">
            <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="ms-3">
                <div class="text-success">Selamat Anda Berhasil Absen Masuk pada pukul {{ session('masuk') }}</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('messageberhasil'))
    <div
        class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2 mb-5">
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

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
    </div>



    <div class="row mt-5">
        <div class="col-12 col-lg-12">
            @if (count($jadwal) > 0)
            <div class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-danger"><i class="bi bi-info-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="text-danger">Terdapat Penukaran Jadwal, Lihat Sekarang!</div>
                    </div>
                    <a type="button" href="{{ route('jadwal-saya.show', Auth::user()->pegawai->id_pegawai) }}" class="btn btn-danger" style="margin-left: 500px">Lihat Penukaran <span class="badge bg-dark">{{ $jadwalcount }} Data</span>
                    </a>
                </div>               
            </div>
            @else
            
            @endif
           
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>
                    <div class="card shadow-none border">
                        <div class="profile-avatar text-center">
                            <img src="{{ asset('/profile/'.Auth::user()->pegawai['avatar']) }}"
                                class="rounded-circle shadow" width="225" height="225" alt="">
                        </div>
                        <div class="card-header">
                            <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('profile.update', Auth::user()->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control"
                                            value="{{ $user->Pegawai->nama_pegawai }} " name="nama_pegawai">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Jenis Kelamin" name="jenis_kelamin">
                                            @if ($user->Pegawai->jenis_kelamin == "Laki-Laki")
                                            <option selected value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            @else
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option selected value="Perempuan">Perempuan</option>
                                            @endif

                                        </select> </div>
                                    <div class="col-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control"
                                            value="{{ $user->Pegawai->tanggal_lahir }}" name="tanggal_lahir">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control"
                                            value="{{ $user->Pegawai->tempat_lahir }}" name="tempat_lahir">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Agama</label>

                                        @if ($user->Pegawai->agama == null)
                                        <select name="agama" id="agama" class="form-select" value="{{ old('agama') }}"
                                            class="form-control @error('agama') is-invalid @enderror">
                                            <option value="{{ old('agama')}}"> Pilih Agama</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                        </select>
                                        @error('agama')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>

                                    @else
                                    <select class="form-select" aria-label="Agama" name="agama">
                                        @if ($user->Pegawai->agama == "Hindu")
                                        <option selected value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Protestan">Protestan</option>
                                        @elseif ($user->Pegawai->agama == "Budha")
                                        <option value="Hindu">Hindu</option>
                                        <option selected value="Budha">Budha</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Protestan">Protestan</option>
                                        @elseif ($user->Pegawai->agama == "Islam")
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option selected value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Protestan">Protestan</option>
                                        @elseif ($user->Pegawai->agama == "Katolik")
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Islam">Islam</option>
                                        <option selected value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Protestan">Protestan</option>
                                        @elseif ($user->Pegawai->agama == "Konghucu")
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option selected value="Konghucu">Konghucu</option>
                                        <option value="Protestan">Protestan</option>
                                        @elseif ($user->Pegawai->agama == "Protestan")
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option selected value="Protestan">Protestan</option>
                                        @endif
                                    </select>

                                    @endif

                                </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none border">
                    <div class="card-header">
                        <h6 class="mb-0">CONTACT INFORMATION</h6>
                    </div>
                    <div class="card-body">

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="{{ $user->Pegawai->alamat }}" name="alamat">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ $user->Pegawai->no_telp }}"
                                name="no_telp">
                        </div>
                        <div class="text-start mt-2">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="assets/images/avatars/avatar-1.png" class="rounded-circle shadow" width="120"
                            height="120" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                        <div class="text-center">
                            <h4 class="mb-0">45</h4>
                            <p class="mb-0 text-secondary">Friends</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">15</h4>
                            <p class="mb-0 text-secondary">Photos</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">86</h4>
                            <p class="mb-0 text-secondary">Comments</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">Jhon Deo, 27</h4>
                        <p class="mb-0 text-secondary">Sydney, Australia</p>
                        <div class="mt-4"></div>
                        <h6 class="mb-1">HR Manager - Codervent Technology</h6>
                        <p class="mb-0 text-secondary">University of Information Technology</p>
                    </div>
                    <hr>
                    <div class="text-start">
                        <h5 class="">About</h5>
                        <p class="mb-0">It is a long established fact that a reader will be distracted by the
                            readable content of a page when looking at its layout. The point of using Lorem.
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                        Followers
                        <span class="badge bg-primary rounded-pill">95</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Following
                        <span class="badge bg-primary rounded-pill">75</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Templates
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ul>
            </div>
        </div> --}}
    </div>
    <!--end row-->

</main>
@endsection
