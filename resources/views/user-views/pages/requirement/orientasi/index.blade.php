@extends('user-views.layouts.app')


@section('name')
Atur Orientasi
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Requirement</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Orientasi Calon Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        @if(session('messageberhasil'))
        <div
            class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2">
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
        <div
            class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
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
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i></div>
                                <div class="tab-title">Calon Peserta Orientasi</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                                <div class="tab-title">Periode Belum Diatur</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="col-12 col-xl-auto mt-2 mb-4">
                            <span id="total_records"></span>
                            <p></p>
                            <form id="form1">
                                @csrf
                                <div class="row input-daterange">
                                    <div class="col-md-5">
                                        <label class="small">Filter berdasarkan status terlaksana</label>
                                        <select name="filter" id="filter" class="form-select">
                                            <option value="">Pilih Status Pelaksanaan</option>
                                            <option value="Belum Terlaksana">Belum Terlaksana</option>
                                            <option value="Sudah Terlaksana">Sudah Terlaksana</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" name="filter" onclick="filter_status(event)"
                                            class="btn btn-sm btn-primary px-4 mt-4">Filter</button>
                                        <button type="button" onclick="reset(event)"
                                            class="btn btn-sm btn-secondary px-4 mt-4">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered dataTable"
                                            style="width: 100%;" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 100px;">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 170px;">Nama Pelamar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Pendidikan Terakhir</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Jurusan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Periode Orientasi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">No. Sertifikat</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Status Orientasi</th>
                                                        @if (Auth::user()->Pegawai->role != 'Direktur')
                                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                                        style="width: 70px;">Action</th>
                                                        @endif
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($peserta as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                    <td>{{ $item->nama_lengkap }}</td>
                                                    <td class="text-center">{{ $item->pendidikan_terakhir }}</td>
                                                    <td class="text-center">{{ $item->jurusan }}</td>
                                                    <td>{{ $item->periode_orientasi ?? 'Belum Ditentukan' }}</td>
                                                    <td>{{ $item->no_sertifikat ?? 'Belum Ditentukan'}}</td>
                                                    <td>{{ $item->status_orientasi ?? 'Belum Ditentukan' }}</td>
                                                    @if (Auth::user()->Pegawai->role != 'Direktur')
                                                    <td class="text-center">
                                                        <a href="javascript:;" class="btn btn-sm btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#Modaldetail-{{ $item->id_calon_pegawai }}"><i
                                                                class="lni lni-eye"></i></a>
                                                        @if ($item->status_orientasi == 'Belum Terlaksana')
                                                        <a href="javascript:;" class="btn btn-sm btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Modalsertifikat-{{ $item->id_calon_pegawai }}"><i
                                                            class="lni lni-certificate"></i></a>
                                                        @endif
                                                      
                                                    </td>
                                                    @endif
                                                   
                                                </tr>
                                                @empty
        
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                        <div class="table-responsive">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-striped table-bordered dataTable"
                                            style="width: 100%;" role="grid" aria-describedby="example_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 100px;">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 170px;">Nama Pelamar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Pendidikan Terakhir</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Jurusan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Periode Orientasi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">No. Sertifikat</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Status Orientasi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                                        style="width: 70px;">Atur Periode</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($tes as $item)
                                                @if ($item->PesertaOrientasi == null)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                    <td>{{ $item->nama_lengkap }}</td>
                                                    <td class="text-center">{{ $item->pendidikan_terakhir }}</td>
                                                    <td class="text-center">{{ $item->jurusan }}</td>
                                                    <td>{{ $item->PesertaOrientasi->MasterOrientasi->periode_orientasi ?? 'Belum Ditentukan' }}
                                                    </td>
                                                    <td>{{ $item->PesertaOrientasi->no_sertifikat ?? 'Belum Ditentukan'}}</td>
                                                    <td>{{ $item->PesertaOrientasi->MasterOrientasi->status_orientasi ?? 'Belum Ditentukan' }}</td>
                                                    <td class="text-center">
                                                        <a href="javascript:;" class="btn btn-sm btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#Modaldetail-{{ $item->id_calon_pegawai }}"><i
                                                                class="lni lni-eye"></i></a>
                                                        <a href="{{ route('peserta-orientasi.edit',$item->id_calon_pegawai) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-bs-original-title="Atur Periode Orientasi"
                                                            class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></a>
                                                    </td>
                                                </tr>
                                                @endif
                                               
                                                @empty
        
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@forelse ($peserta as $item)
<div class="modal fade" id="Modalsertifikat-{{ $item->id_calon_pegawai }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nomor Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perserta-orientasi-seritifikat', $item->id_calon_pegawai) }}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="nama_lengkap">Nama Lengkap Peserta</label>
                                <input class="form-control" name="nama_lengkap" type="text" id="nama_lengkap"
                                    value="{{ $item->nama_lengkap }}" readonly></input>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="nama_panggilan">Nama Panggilan</label>
                                <input class="form-control" name="nama_panggilan" type="text" id="nama_panggilan"
                                    value="{{ $item->nama_panggilan }}" readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="periode_orientasi">Periode Orientasi</label>
                                <input class="form-control" name="periode_orientasi" type="text" id="periode_orientasi"
                                    value="{{ $item->PesertaOrientasi->MasterOrientasi->periode_orientasi ?? 'Belum Ditentukan' }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="tanggal_orientasi">Tanggal Orientasi</label>
                                <input class="form-control" name="tanggal_orientasi" type="text" id="tanggal_orientasi"
                                    value="{{ $item->PesertaOrientasi->MasterOrientasi->tanggal_orientasi ?? 'Belum Ditentukan' }}"
                                    readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label class="small mb-1 mr-1" for="no_sertifikat">Nomor Sertifikat</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="no_sertifikat" type="text" id="no_sertifikat"
                            value="{{ $item->PesertaOrientasi->no_sertifikat ?? '' }}" required></input>
                    </div>
                    <div class="form-group mb-2">
                        <label class="small mb-1 mr-1" for="keterangan">Keterangan</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan"
                            value="{{ $item->PesertaOrientasi->keterangan ?? '' }}" required>{{ $item->PesertaOrientasi->keterangan ?? '' }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse


@forelse ($peserta as $item)
<div class="modal fade" id="Modaldetail-{{ $item->id_calon_pegawai }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Orientasi Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="nama_lengkap">Nama Lengkap Peserta</label>
                            <input class="form-control" name="nama_lengkap" type="text" id="nama_lengkap"
                                value="{{ $item->nama_lengkap }}" readonly></input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="nama_panggilan">Nama Panggilan</label>
                            <input class="form-control" name="nama_panggilan" type="text" id="nama_panggilan"
                                value="{{ $item->nama_panggilan }}" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                            <input class="form-control" name="pendidikan_terakhir" type="text" id="pendidikan_terakhir"
                                value="{{ $item->pendidikan_terakhir }}" readonly></input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="jurusan">Jurusan</label>
                            <input class="form-control" name="jurusan" type="text" id="jurusan"
                                value="{{ $item->jurusan }}" readonly></input>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="periode_orientasi">Periode Orientasi</label>
                            <input class="form-control" name="periode_orientasi" type="text" id="periode_orientasi"
                                value="{{ $item->periode_orientasi ?? 'Belum Ditentukan' }}"
                                readonly></input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="small mb-1 mr-1">Tanggal Orientasi</label>
                            <input class="form-control" type="text" id="tanggal_orientasi"
                                value="{{ $item->tanggal_orientasi ?? 'Belum Ditentukan' }}"
                                readonly></input>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label class="small mb-1 mr-1">Nomor Sertifikat</label>
                    <input class="form-control" type="text" id="no_seritifikat"
                        value="{{ $item->no_seritifikat ?? 'Belum Berjalan' }}" readonly></input>
                </div>
                <div class="form-group mb-2">
                    <label class="small mb-1 mr-1">Keterangan</label>
                    <input class="form-control" type="text" id="keterangan"
                        value="{{ $item->keterangan ?? 'Belum Berjalan' }}" readonly></input>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@empty

@endforelse


<script>
    function filter_status(event) {
        event.preventDefault()
        var form1 = $('#form1')
        var filter = form1.find('select[name="filter"]').val()
        console.log(filter)
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: 'Mohon Tunggu, Sedang diproses ...'
        })

        window.location.href = '/Requirement/peserta-orientasi?from=' + filter
    }

    function reset(){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: 'Mohon Tunggu, Sedang diproses ...'
        })

        window.location.href = '/Requirement/peserta-orientasi/filter?from=' + filter

    }

</script>

@endsection



