@extends('user-views.layouts.app')


@section('name')
Hasil Seleksi Pelamar
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
                        <li class="breadcrumb-item active" aria-current="page">Hasil Seleksi Pelamar</li>
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
                                                style="width: 80px;">Job yang dituju</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Nomor Telephone</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Nilai Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Rata-Rata</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($calon as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->Pengumuman->nama_pengumuman }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->no_telp }}</td>
                                            <td class="text-center">{{ $item->nilai_total }}</td>
                                            <td class="text-center">{{ $item->rata_rata }}</td>
                                            @if ($item->status_calon == 'Diterima')
                                            <td class="text-center"><span
                                                    class="badge bg-success">{{ $item->status_calon }}</span></td>
                                            @else
                                            <td class="text-center"><span
                                                    class="badge bg-danger">{{ $item->status_calon }}</span></td>
                                            @endif
                                            <td class="text-center">
                                                <a href="javascript:;" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modaldetail-{{ $item->id_calon_pegawai }}"><i
                                                        class="lni lni-eye"></i></a>

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

@forelse ($calon as $item)
<div class="modal fade" id="Modaldetail-{{ $item->id_calon_pegawai }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Orientasi Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="border p-3 rounded">
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
                                        <input class="form-control" name="nama_panggilan" type="text"
                                            id="nama_panggilan" value="{{ $item->nama_panggilan }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="pendidikan_terakhir">Pendidikan
                                            Terakhir</label>
                                        <input class="form-control" name="pendidikan_terakhir" type="text"
                                            id="pendidikan_terakhir" value="{{ $item->pendidikan_terakhir }}"
                                            readonly></input>
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
                                        <label class="small mb-1 mr-1" for="email">Email</label>
                                        <input class="form-control" name="email" type="text" id="email"
                                            value="{{ $item->email }}" readonly></input>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1">Nomor Telephone</label>
                                        <input class="form-control" type="text" id="tanggal_orientasi"
                                            value="{{ $item->no_telp }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="email">Status Penerimaan</label>
                                        <input class="form-control" name="email" type="text" id="email"
                                            value="{{ $item->status_calon }}" readonly></input>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1">Pendidikan Terakhir</label>
                                        <input class="form-control" type="text" id="tanggal_orientasi"
                                            value="{{ $item->pendidikan_terakhir }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="email">Jurusan</label>
                                        <input class="form-control" name="email" type="text" id="email"
                                            value="{{ $item->jurusan }}" readonly></input>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1">Status Nilai</label>
                                        <input class="form-control" type="text" id="tanggal_orientasi"
                                            value="{{ $item->status_nilai }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1">Alamat Lengkap</label>
                                <textarea class="form-control" type="text" id="tanggal_orientasi"
                                    value="{{ $item->alamat_lengkap }}" readonly>{{ $item->alamat_lengkap }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h5> Nilai Final Seleksi Peserta</h5>
                        <div class="border p-3 rounded">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="nama_lengkap">Nilai Psikotes</label>
                                        <input class="form-control" name="nama_lengkap" type="text" id="nama_lengkap"
                                            value="{{ $item->nilai_psikotes }}" readonly></input>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="nama_panggilan">Nilai Keahlian</label>
                                        <input class="form-control" name="nama_panggilan" type="text"
                                            id="nama_panggilan" value="{{ $item->nilai_keahlian }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="pendidikan_terakhir">Nilai Wawancara</label>
                                        <input class="form-control" name="pendidikan_terakhir" type="text"
                                            id="pendidikan_terakhir" value="{{ $item->nilai_wawancara }}"
                                            readonly></input>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="jurusan">Nilai Total</label>
                                        <input class="form-control" name="jurusan" type="text" id="jurusan"
                                            value="{{ $item->nilai_total }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="email">Rata-Rata</label>
                                        <input class="form-control" name="email" type="text" id="email"
                                            value="{{ $item->rata_rata }}" readonly></input>
                                    </div>
                                </div>
                            </div>
                        </div>
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


@endsection
