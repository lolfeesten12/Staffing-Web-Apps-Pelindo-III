@extends('user-views.layouts.app')


@section('name')
Profile
@endsection

@section('content')
<main class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3 text-white">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt text-white"></i></a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-light">Settings</button>
                <button type="button" class="btn btn-light split-bg-light dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                        link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="profile-cover bg-dark"></div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>
                    <div class="card shadow-none border">
                         <div class="profile-avatar text-center">
                        <img src="{{ asset('/profile/'.Auth::user()->pegawai['avatar']) }}" class="rounded-circle shadow" width="225"
                            height="225" alt="">
                    </div>
                        <div class="card-header">
                            <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $user->Pegawai->nama_pegawai }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $user->email }}">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Jenis Kelamin">
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
                                    <input type="date" class="form-control" value="{{ $user->Pegawai->tanggal_lahir }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $user->Pegawai->tempat_lahir }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Agama</label>
                                    <select class="form-select" aria-label="Agama">
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
                                </div>


                                <div class="col-6">
                                    <label class="form-label">Nomor SK Penempatan</label>
                                    <input disabled type="text" class="form-control" value="belom">
                                </div>
                                {{-- <div class="col-6">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" value="">
                                        </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">CONTACT INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $user->Pegawai->alamat }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" value="{{ $user->Pegawai->no_telp }}">
                                </div>
                                {{-- <div class="col-6">
                                            <label class="form-label">Pin Code</label>
                                            <input type="text" class="form-control" value="jhon">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" value="Deo">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">About Me</label>
                                            <textarea class="form-control" rows="4" cols="4"
                                                placeholder="Describe yourself..."></textarea>
                                        </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="text-start">
                        <button type="button" class="btn btn-primary px-4">Save Changes</button>
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
