@extends('user-views.layouts.app')


@section('name')
Riwayat Prestasi
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Riwayat Prestasi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#Modaltambah">Tambah Data</button>
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
                                                style="width: 410px;">Nama Prestasi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 410px;">Tingkat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 410px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($riwayat as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>

                                            <td>{{ $item->nama_prestasi }}</td>
                                            <td>{{ $item->tingkat }}</td>

                                            <td>{{ $item->tanggal }}</td>

                                            <td class="text-center">
                                                <a href="javascript:;" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modaledit-{{ $item->id_riwayat_prestasi }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_riwayat_prestasi }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            </td>
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
        </div>
    </div>
</main>


<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Riwayat Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('prestasi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">


                        <label class="small mb-1 mr-1" for="nama_prestasi">Nama Prestasi</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_prestasi" type="text" id="nama_prestasi"
                            value="{{ old('nama_prestasi') }}" placeholder="Nama Prestasi" required />

                        <label class="small mb-1 mr-1" for="tingkat">Tingkat</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="tingkat" type="text" id="tingkat"
                             value="{{ old('tingkat') }}" placeholder="Tingkat" required />

                        <label class="small mb-1 mr-1" for="tanggal">Tanggal</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="tanggal" type="date" id="tanggal"
                            placeholder="Tanggal" value="{{ old('tanggal') }}" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@forelse ($riwayat as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_riwayat_prestasi }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Riwayat Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('prestasi.update', $item->id_riwayat_prestasi) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>

                <label class="small mb-1 mr-1" for="nama_prestasi">Nama Prestasi</label><span class="mr-4 mb-3"
                    style="color: red">*</span>
                <input class="form-control" name="nama_prestasi" type="text" id="nama_prestasi"
                    value="{{ $item->nama_prestasi }}" required />

                <label class="small mb-1 mr-1" for="tingkat">Tingkat</label><span class="mr-4 mb-3"
                    style="color: red">*</span>
                <input class="form-control" name="tingkat" type="text" id="tingkat"
                     value="{{ $item->tingkat }}" required />

                <label class="small mb-1 mr-1" for="tanggal">Tanggal</label><span class="mr-4 mb-3"
                    style="color: red">*</span>
                <input class="form-control" name="tanggal" type="date" id="tanggal"
                    placeholder="tanggal" value="{{ $item->tanggal }}" required />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@forelse ($riwayat as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_riwayat_prestasi }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Hapus Riwayat Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('prestasi.destroy', $item->id_riwayat_prestasi) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-white">
                    Apakah Anda Yakin Menghapus Data Prestasi {{ $item->nama_prestasi }} ?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@endsection
