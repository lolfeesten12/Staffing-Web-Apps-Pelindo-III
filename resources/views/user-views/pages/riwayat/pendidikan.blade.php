@extends('user-views.layouts.app')


@section('name')
Riwayat Pendidikan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Riwayat Pendidikan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
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
                                                style="width: 410px;">Tipe Pendidikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 410px;">Nama Sekolah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 410px;">Jurusan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 410px;">No Ijazah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 410px;">Tanggal_ijazah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($riwayat as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>@if ($item->tipe_pendidikan != null)
                                                {{ $item->tipe_pendidikan }}
                                                @else
                                                {{ $item->DetailPendidikan->nama_pendidikan }}
                                                @endif
                                            </td>
                                            <td>{{ $item->nama_sekolah }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->no_ijasah }}</td>
                                            <td>{{ $item->tanggal_ijasah }}</td>

                                            <td class="text-center">
                                                <a href="javascript:;" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modaledit-{{ $item->id_riwayat_pendidikan }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_riwayat_pendidikan }}"><i
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
                <h5 class="modal-title">Tambah Riwayat Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pendidikan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                            data-bs-target="#Modaltambahpendidikan">Tambah</button>
                        <select class="form-select" aria-label="Default select example" name="tipe_pendidikan"
                            type="text" id="tipe_pendidikan" required>
                            <option selected="">Pilih Tipe Pendidikan</option>
                            <option value="TK">TK</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            @if ($detail != '' | $detail != null)
                                @foreach ($detail as $details)
                                    <option value={{ $details->nama_pendidikan }}>{{ $details->nama_pendidikan }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">


                        <label class="small mb-2 mr-1" for="nama_sekolah">Nama Sekolah</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_sekolah" type="text" id="nama_sekolah"
                            value="{{ old('nama_sekolah') }}" placeholder="Nama Sekolah" required />
                        <label class="small mb-2 mr-1" for="jurusan">Jurusan</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="jurusan" type="text" id="jurusan" value="{{ old('jurusan') }}"
                            placeholder="Jurusan" required />
                        <label class="small mb-2 mr-1" for="no_ijasah">No Ijasah</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="no_ijasah" type="text" id="no_ijasah" placeholder="No Ijasah"
                            value="{{ old('no_ijasah') }}" required />
                        <label class="small mb-2 mr-1" for="tanggal_ijasah">Tanggal Ijasah</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="tanggal_ijasah" type="date" id="tanggal_ijasah"
                            placeholder="Tanggal Ijasah" value="{{ old('tanggal_ijasah') }}" required />

                        {{-- <label class="small mb-2" for="file_ijasah">File Ijasah</label>
                        <input class="form-control" id="file_ijasah" type="file" name="file_ijasah"
                            value="{{ old('file_ijasah') }}" accept="application/pdf" multiple="multiple">
                        <div class="small">
                            <span class="text-muted">Accept File in PDF Format </span>
                        </div> --}}
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

{{-- TAMBAH HUBUNGAN --}}
<div class="modal fade" id="Modaltambahpendidikan" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pendidikan-tambahdetail') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_pendidikan">Nama Pendidikan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="nama_pendidikan" type="text" id="nama_pendidikan"
                            placeholder="Input Nama Pendidikan" value="{{ old('nama_pendidikan') }}" required />
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
<div class="modal fade" id="Modaledit-{{ $item->id_riwayat_pendidikan }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Riwayat Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pendidikan.update', $item->id_riwayat_pendidikan) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <label class="small mb-1 mr-1" for="kel_nama">Tipe Pendidikan</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                    <select class="form-select" aria-label="Default select example" name="tipe_pendidikan" type="text"
                        id="tipe_pendidikan" required>
                        <option selected="">Pilih Tipe Pendidikan</option>
                        <option value="TK" @if($item->tipe_pendidikan == 'TK')
                            selected
                            @endif>TK</option>
                        <option value="SD" @if($item->tipe_pendidikan == 'SD')
                            selected
                            @endif>SD</option>
                        <option value="SMP" @if($item->tipe_pendidikan == 'SMP')
                            selected
                            @endif>SMP</option>
                        <option value="SMA" @if($item->tipe_pendidikan == 'SMA')
                            selected
                            @endif>SMA</option>
                        <option value="SMK" @if($item->tipe_pendidikan == 'SMK')
                            selected
                            @endif>SMK</option>
                        <option value="S1" @if($item->tipe_pendidikan == 'S1')
                            selected
                            @endif>S1</option>
                        <option value="S2" @if($item->tipe_pendidikan == 'S2')
                            selected
                            @endif>S2</option>
                        <option value="S3" @if($item->tipe_pendidikan == 'S3')
                            selected
                            @endif>S3</option>
                        <option value="D1" @if($item->tipe_pendidikan == 'D1')
                            selected
                            @endif>D1</option>
                        <option value="D2" @if($item->tipe_pendidikan == 'D2')
                            selected
                            @endif>D2</option>
                        <option value="D3" @if($item->tipe_pendidikan == 'D3')
                            selected
                            @endif>D3</option>
                        <option value="D4" @if($item->tipe_pendidikan == 'D4')
                            selected
                            @endif>D4</option>
                    </select>

                    <label class="small mb-1 mr-1" for="nama_sekolah">Nama Sekolah</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                    <input class="form-control" name="nama_sekolah" type="text" id="nama_sekolah"
                        value="{{ $item->nama_sekolah }}" required />
                    <label class="small mb-1 mr-1" for="jurusan">Jurusan</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                    <input class="form-control" name="jurusan" type="text" id="jurusan" value="{{ $item->jurusan }}"
                        required />
                    <label class="small mb-1 mr-1" for="no_ijasah">No Ijasah</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                    <input class="form-control" name="no_ijasah" type="text" id="no_ijasah" placeholder="No Ijasah"
                        value="{{ $item->no_ijasah }}" required />
                    <label class="small mb-1 mr-1" for="tanggal_ijasah">Tanggal Ijasah</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                    <input class="form-control" name="tanggal_ijasah" type="date" id="tanggal_ijasah"
                        placeholder="tanggal Ijasah" value="{{ $item->tanggal_ijasah }}" required />
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
<div class="modal fade" id="Modalhapus-{{ $item->id_riwayat_pendidikan }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Hapus Riwayat Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pendidikan.destroy', $item->id_riwayat_pendidikan) }}" method="POST"
                class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-white">
                    Apakah Anda Yakin Menghapus Data Pendidikan {{ $item->tipe_pendidikan }} ?</div>
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
