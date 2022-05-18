@extends('user-views.layouts.app')


@section('name')
Penilaian Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Penilaian Pegawai</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Nilai {{ $pegawai->nama_pegawai }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('penilaian-pegawai.edit', $pegawai->id_pegawai) }}" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="" data-bs-original-title="Tambah Data Nilai"
                    class="btn btn-sm btn-primary">Tambah Data</a>
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
                                                style="width: 170px;">Nomor</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Periode Mulai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Periode Akhir</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Penilai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Pengesah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Total Nilai</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Penilaian</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($nilai as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->no_penilaian }}</td>
                                            <td>{{ $item->periode_mulai }}</td>
                                            <td>{{ $item->periode_akhir }}</td>
                                            <td>{{ Auth::user()->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->AtasanPenilai->nama_pegawai }}</td>
                                            <td>{{ $item->nilai_rata2 }}</td>
                                            <td>
                                                @if ($item->nilai_rata2 >= 0 && $item->nilai_rata2 <= 20 )
                                                <span class="badge bg-light-info text-info w-100">Buruk</span>
                                                @elseif ($item->nilai_rata2 >= 21 && $item->nilai_rata2 <= 40 )
                                                <span class="badge bg-light-info text-info w-100">Kurang</span>
                                                @elseif ($item->nilai_rata2 >= 41 && $item->nilai_rata2 <= 60 )
                                                <span class="badge bg-light-info text-info w-100">Cukup</span>
                                                @elseif ($item->nilai_rata2 >= 61 && $item->nilai_rata2 <= 80 )
                                                <span class="badge bg-light-info text-info w-100">Baik</span>
                                                @elseif ($item->nilai_rata2 >= 81 && $item->nilai_rata2 <= 100 )
                                                <span class="badge bg-light-info text-info w-100">Sangat Baik</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_acc == 'Pending')
                                                <span
                                                    class="badge bg-light-info text-info w-100">{{ $item->status_acc }}</span>
                                                @elseif ($item->status_acc == 'Not Approved')
                                                <span
                                                    class="badge bg-light-danger text-danger w-100">{{ $item->status_acc }}</span>
                                                @elseif ($item->status_acc == 'Approved')
                                                <span
                                                    class="badge bg-light-success text-success w-100">{{ $item->status_acc }}</span>
                                                @elseif ($item->status_acc == 'Keberatan')
                                                <span
                                                    class="badge bg-light-warning text-warning w-100">Keberatan</span>
                                                    @elseif ($item->status_acc == 'Ditanggapi')
                                                    <span
                                                    class="badge bg-light-warning text-warning w-100">Ditanggapi</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_acc != 'Keberatan' && $item->status_acc != 'Ditanggapi' )
                                                <a href="javascript:;" class="btn btn-sm btn-secondary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Modaldetail-{{ $item->id_penilaian }}"><i
                                                    class="lni lni-eye"></i></a>
                                                <a href="{{ route('penilaian-pegawai.show',$item->id_penilaian) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Edit Data Pegawai"
                                                    class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_penilaian }}"><i
                                                        class="bi bi-trash-fill"></i></a>

                                                @else
                                                <a href="javascript:;" class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Modaltanggapan-{{ $item->id_penilaian }}"><i class="lni lni-comments"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-secondary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Modaldetail-{{ $item->id_penilaian }}"><i
                                                    class="lni lni-eye"></i></a>
                                                <a href="{{ route('penilaian-pegawai.show',$item->id_penilaian) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Edit Data Pegawai"
                                                    class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_penilaian }}"><i
                                                        class="bi bi-trash-fill"></i></a>

                                                @endif
                                          
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

@forelse ($nilai as $item)
<div class="modal fade" id="Modaltanggapan-{{ $item->id_penilaian }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Beri Tanggapan Keberatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('nilai-tanggapan', $item->id_penilaian) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Beri Tanggapan Keberatan Penilaian Pegawai</label>
                    <hr></hr>
                    <div class="form-group mb-2">
                        <label class="small mb-1 mr-1" for="keberatan">Keberatan</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <textarea class="form-control" name="keberatan" type="text" id="keberatan"
                            value="{{ $item->keberatan }}" readonly>{{ $item->keberatan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="tanggapan_penilai">Tanggapan Atas Keberatan</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <textarea class="form-control" name="tanggapan_penilai" type="text" id="tanggapan_penilai"
                            value="{{ old('tanggapan_penilai') }}" required>{{ $item->tanggapan_penilai ?? '' }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Kirim Tanggapan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@forelse ($nilai as $item)
<div class="modal fade" id="Modaldetail-{{ $item->id_penilaian }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Nilai Periode {{ $item->Pegawai->nama_pegawai }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="border p-3 rounded mt-4">
                    <span>Data Nilai</span>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Periode Mulai</label>
                                <input class="form-control" type="text" value="{{ $item->periode_mulai }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Periode Akhir</label>
                                <input class="form-control" type="text" value="{{ $item->periode_akhir }}"
                                    readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Status Penilaian</label>
                                @if ($item->nilai_rata2 >= 0 && $item->nilai_rata2 <= 20 )
                                <input class="form-control" type="text" value="Buruk" readonly></input>
                                @elseif ($item->nilai_rata2 >= 21 && $item->nilai_rata2 <= 40 )
                                <input class="form-control" type="text" value="Kurang" readonly></input>
                                @elseif ($item->nilai_rata2 >= 41 && $item->nilai_rata2 <= 60 )
                                <input class="form-control" type="text" value="Cukup" readonly></input>
                                @elseif ($item->nilai_rata2 >= 61 && $item->nilai_rata2 <= 80 )
                                <input class="form-control" type="text" value="Baik" readonly></input>
                                @elseif ($item->nilai_rata2 >= 81 && $item->nilai_rata2 <= 100 )
                                <input class="form-control" type="text" value="Sangat Baik" readonly></input>
                                @endif
                            </div>
                        </div>
                       
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Status Penilaian</label>
                                <input class="form-control" type="text" value="{{ $item->status_acc }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Atasan Penilai</label>
                                <input class="form-control" type="text" value="{{ $item->AtasanPenilai->nama_pegawai }}"
                                    readonly></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border p-3 rounded mt-4">
                    <span>Penilaian Pegawai</span>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Tanggung Jawab</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_tanggung_jawab }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Integritas</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_integritas }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Komitmen</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_komitmen }}"
                                    readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Disiplin</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_disiplin }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Kerjasama</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_kerjasama }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Sikap</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_sikap }}"
                                    readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Kepemimpinan</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_kepemimpinan }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Nilai Total</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_total }}"
                                    readonly></input>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Rata-Rata</label>
                                <input class="form-control" type="text" value="{{ $item->nilai_rata2 }}"
                                    readonly></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1">Catatan Penilaian</label>
                        <textarea class="form-control" type="text" value="{{ $item->catatan_penilaian }}"
                            readonly>{{ $item->catatan_penilaian }}</textarea>
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


@forelse ($nilai as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_penilaian }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Hapus Data Penilaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penilaian-pegawai.destroy', $item->id_penilaian) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-white">
                    Apakah Anda Yakin Menghapus Data Penilaian dengan nomor {{ $item->no_penilaian }} atas nama
                    {{ $item->Pegawai->nama_pegawai }} ?</div>
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
