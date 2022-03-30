@extends('user-views.layouts.app')


@section('name')
Pengajuan Cuti
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cuti</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pengajuan Cuti Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        @if(session('messageberhasil'))
        <div class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2">
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
        @if(session('messagehapus'))
        <div class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-danger"> {{ session('messagehapus') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('pengajuan-cuti.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="id_jabatan">Jenis Cuti</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="jenis_cuti" id="id_jabatan" value="">
                                            <option>Pilih Jenis Cuti</option>
                                            <option value="Sakit">Sakit
                                            </option>
                                            <option value="Alasan Penting">Alasan Penting
                                            </option>
                                            <option value="Melahirkan">Melahirkan
                                            </option>
                                            <option value="Tahunan">Tahunan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label mr-1" for="nama_pegawai">Alasan
                                            Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Alasan Cuti" name="alasan" value="">
                                    </div>

                                    <div class="col-5">
                                        <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal Mulai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_mulai" placeholder="Tanggal Mulai Cuti" value="">
                                    </div>
                                    <div class="col-5">
                                        <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal Selesai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_selesai" placeholder="Tanggal Selesai Cuti" value="">
                                    </div>


                                    <div class="col-2">
                                        <label class="form-label mr-1" for="nama_panggilan">Lama Cuti</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="number" class="form-control" placeholder="Lama Cuti" name="cuti_lama" value="">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Data yang Anda inputkan sudah sesuai
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="submit">Simpan</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
