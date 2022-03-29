@extends('user-views.layouts.app')


@section('name')
Pelanggaran Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Pelanggaran</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pelanggaran Pegawai</li>
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
                                                style="width: 170px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">No. Surat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jabatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Pelanggaran</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Sanksi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pelanggaran as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->no_surat }}</td>
                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->Pegawai->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Pelanggaran->pelanggaran }}</td>
                                            <td>{{ $item->Pelanggaran->Sanksi->nama_sanksi }}</td>
                                            <td class="text-center">
                                                <a href="javascript:;" class="btn btn-sm btn-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modaldetail-{{ $item->id_pelanggaran }}"><i
                                                        class="lni lni-eye"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modaledit-{{ $item->id_pelanggaran }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_pelanggaran }}"><i
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

@forelse ($pelanggaran as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_pelanggaran }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pelanggaran-pegawai.update', $item->id_pelanggaran) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="border p-4 rounded">
                        <div class="row">
                            <div class="col-4">
                                <label class="small mb-1 mr-1" for="no_surat">Nomor Surat</label>
                                <input class="form-control" id="no_surat" type="text" name="no_surat"
                                    value="{{ $item->no_surat }}" readonly />
                            </div>
                            <div class="col-4">
                                <label class="small mb-1 mr-1" for="tanggal">Tanggal Pelanggaran</label>
                                <input class="form-control" id="tanggal" type="date" name="tanggal"
                                    value="{{ $item->tanggal }}" required />
                            </div>
                            <div class="col-4">
                                <label class="small mb-1 mr-1" for="id_pegawai">Pilih Pegawai</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <select class="form-select" name="id_pegawai" id="id_pegawai"
                                    value="{{ old('id_pegawai') }}" required>
                                    <option value="{{ $item->Pegawai->id_pegawai }}">{{ $item->Pegawai->nama_pegawai }}
                                    </option>
                                    @foreach ($pegawai as $pegawais)
                                    <option value="{{ $pegawais->id_pegawai }}">{{ $pegawais->nama_pegawai }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label class="small mb-1 mr-1" for="id_pelanggaran">Pelanggaran</label>
                            <select class="form-select" name="id_pelanggaran" id="id_pelanggaran"
                                value="{{ old('id_pelanggaran') }}"
                                class="form-control @error('id_pelanggaran') is-invalid @enderror" required>
                                <option value="{{ $item->Pelanggaran->id_pelanggaran }}">{{ $item->Pelanggaran->pelanggaran }}</option>
                                @foreach ($masterdata as $master)
                                <option value="{{ $master->id_pelanggaran }}">{{ $master->pelanggaran }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label class="small mb-1 mr-1" for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" type="text" name="keterangan"
                                value="{{ $item->keteragan }}" required>{{ $item->keterangan }}</textarea>
                        </div>
                    </div>
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

@forelse ($pelanggaran as $item)
<div class="modal fade" id="Modaldetail-{{ $item->id_pelanggaran }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="border p-4 rounded">
                    <div class="row">
                        <div class="col-4">
                            <label class="small mb-1 mr-1" for="no_surat">Nomor Surat</label>
                            <input class="form-control" id="no_surat" type="text" name="no_surat"
                                value="{{ $item->no_surat }}" readonly />
                        </div>
                        <div class="col-4">
                            <label class="small mb-1 mr-1" for="tanggal">Tanggal Pelanggaran</label>
                            <input class="form-control" id="no_surat" type="text" name="no_surat"
                                value="{{ $item->tanggal }}" readonly />
                        </div>
                        <div class="col-4">
                            <label class="small mb-1 mr-1" for="id_pegawai">Pilih Pegawai</label>
                            <input class="form-control" id="no_surat" type="text" name="no_surat"
                                value="{{ $item->Pegawai->nama_pegawai }}" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mt-2 mb-2">
                                <label class="small mb-1 mr-1" for="id_pelanggaran">Pelanggaran</label>
                                <input class="form-control" id="no_surat" type="text" name="no_surat"
                                    value="{{ $item->Pelanggaran->pelanggaran }}" readonly />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-2 mb-2">
                                <label class="small mb-1 mr-1" for="id_pelanggaran">Sanksi</label>
                                <input class="form-control" id="no_surat" type="text" name="no_surat"
                                    value="{{ $item->Pelanggaran->Sanksi->nama_sanksi }}" readonly />
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group mt-2 mb-2">
                        <label class="small mb-1 mr-1" for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="no_surat" type="text" name="no_surat"
                            value="{{ $item->keteragan }}" readonly>{{ $item->keterangan }}</textarea>
                    </div>
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


<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pelanggaran-pegawai.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="border p-4 rounded">
                        <h6 class="small mb-1">Isikan Form Dibawah Ini</h6>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <label class="small mb-1 mr-1" for="tanggal">Tanggal Pelanggaran</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control" id="tanggal" type="date" name="tanggal"
                                    placeholder="Input Tanggal Pelanggaran" value="{{ old('tanggal') }}"
                                    class="form-control @error('tanggal') is-invalid @enderror" required />
                                @error('tanggal')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="col-6">
                                <label class="small mb-1 mr-1" for="id_pegawai">Pilih Pegawai</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <select class="form-select" name="id_pegawai" id="id_pegawai"
                                    value="{{ old('id_pegawai') }}"
                                    class="form-control @error('id_pegawai') is-invalid @enderror" required>
                                    <option>Pilih Pegawai</option>
                                    @foreach ($pegawai as $pegawais)
                                    <option value="{{ $pegawais->id_pegawai }}">{{ $pegawais->nama_pegawai }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label class="small mb-1 mr-1" for="id_pelanggaran">Pelanggaran</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <select class="form-select" name="id_pelanggaran" id="id_pelanggaran"
                                value="{{ old('id_pelanggaran') }}"
                                class="form-control @error('id_pelanggaran') is-invalid @enderror" required>
                                <option>Pilih Pelanggaran</option>
                                @foreach ($masterdata as $master)
                                <option value="{{ $master->id_pelanggaran }}">{{ $master->pelanggaran }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_pelanggaran')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label class="small mb-1 mr-1" for="keterangan">Keterangan</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <textarea class="form-control" id="keterangan" type="text" name="keterangan"
                                placeholder="Input Keterangan Pelanggaran" value="{{ old('keterangan') }}"
                                class="form-control @error('keterangan') is-invalid @enderror" required></textarea>
                            @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
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

@forelse ($pelanggaran as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_pelanggaran }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Hapus Data Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pelanggaran-pegawai.destroy', $item->id_pelanggaran) }}" method="POST"
                class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-white">
                    Apakah Anda Yakin Menghapus Data Pelanggaran Pegawai atas nama {{ $item->Pegawai->nama_pegawai }} ?
                </div>
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
