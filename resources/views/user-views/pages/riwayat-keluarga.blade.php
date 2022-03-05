@extends('user-views.layouts.app')


@section('name')
Riwayat Keluarga
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Keluarga</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleFullScreenModal">Tambah Data</button>
                {{-- <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary">Tambah Data</a> --}}
                <!-- Modal -->
                <div class="modal fade" id="exampleFullScreenModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Riwayat Keluarga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="col-8 mx-auto">
                                    <div class="border p-3 rounded">
                                        <form action="{{ route('riwayat-keluarga.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label mr-1" for="kel_nama">Nama Lengkap
                                                    </label><span class="mr-4 mb-3" style="color: red">*</span>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap "
                                                        name="kel_nama" value="{{ old('kel_nama') }}"
                                                        class="form-control @error('kel_nama') is-invalid @enderror">
                                                    @error('kel_nama')<div class="invalid-feedback">{{ $message }}
                                                    </div> @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label class="small mb-1 mr-1" for="id_hub_keluarga">Hubungan
                                                        Keluarga</label><span class="mr-4 mb-3"
                                                        style="color: red">*</span>
                                                    <select class="form-select" name="id_hub_keluarga"
                                                        id="id_hub_keluarga" value="{{ old('id_hub_keluarga') }}"
                                                        class="form-control @error('id_hub_keluarga') is-invalid @enderror">
                                                        <option>Pilih Hubungan Keluarga</option>
                                                        @foreach ($hubungan as $item)
                                                        <option value="{{ $item->id_hub_keluarga }}">
                                                            {{ $item->hubungan_keluarga }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_hub_keluarga')<div class="text-danger small mb-1">
                                                        {{ $message }}
                                                    </div> @enderror
                                                </div>

                                                <div class="col-4">
                                                    <label class="small mb-1 mr-1" for="kel_tempat_lahir">Tempat
                                                        Lahir</label><span class="mr-4 mb-3" style="color: red">*</span>
                                                    <input class="form-control" id="kel_tempat_lahir" type="text"
                                                        name="kel_tempat_lahir" placeholder="Input Tempat Lahir"
                                                        value="{{ old('kel_tempat_lahir') }}"
                                                        class="form-control @error('kel_tempat_lahir') is-invalid @enderror" />
                                                    @error('tempat_lahir')<div class="text-danger small mb-1">
                                                        {{ $message }}
                                                    </div> @enderror
                                                </div>
                                                <div class="col-4">
                                                    <label class="small mb-1 mr-1" for="kel_tanggal_lahir">Tanggal
                                                        Lahir</label><span class="mr-4 mb-3" style="color: red">*</span>
                                                    <input class="form-control" id="kel_tanggal_lahir" type="date"
                                                        name="kel_tanggal_lahir" placeholder="Input Tanggal Lahir"
                                                        value="{{ old('kel_tanggal_lahir') }}"
                                                        class="form-control @error('kel_tanggal_lahir') is-invalid @enderror" />
                                                    @error('kel_tanggal_lahir')<div class="text-danger small mb-1">
                                                        {{ $message }}
                                                    </div> @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label class="small mb-1 mr-1" for="kel_alamat">Alamat
                                                        Lengkap</label><span class="mr-4 mb-3"
                                                        style="color: red">*</span>
                                                    <textarea class="form-control" id="kel_alamat" type="text" rows="3"
                                                        cols="4" name="kel_alamat" placeholder="Input Alamat Pegawai"
                                                        value="{{ old('kel_alamat') }}"
                                                        class="form-control @error('kel_alamat') is-invalid @enderror"></textarea>
                                                    @error('kel_alamat')<div class="text-danger small mb-1">
                                                        {{ $message }}
                                                    </div> @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault" required>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Data yang Anda inputkan sudah sesuai
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary px-4" type="submit">Tambah
                                                        Data</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
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
                                                style="width: 170px;">Status Hubungan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Tempat Lahir</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Tanggal Lahir</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Alamat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($riwayat as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->Hubungan->hubungan_keluarga }}</td>
                                            <td>{{ $item->kel_nama }}</td>
                                            <td>{{ $item->kel_tempat_lahir }}</td>
                                            <td>{{ $item->kel_tanggal_lahir }}</td>
                                            <td>{{ $item->kel_alamat }}</td>

                                            <td class="text-center">
                                                {{-- <a href="#" class="btn btn-sm btn-secondary"><i
                                                        class="lni lni-eye"></i></a> --}}
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#modaledit-{{ $item->id_riwayat_keluarga }}"
                                                    class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></a>

                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_riwayat_keluarga }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modaledit-{{ $item->id_riwayat_keluarga }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal
                                                            title-{{ $item->id_riwayat_keluarga }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="">
                                                            <div class="border p-3 rounded">
                                                                <form
                                                                    action="{{ route('riwayat-keluarga.update', $item->id_riwayat_keluarga) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="row g-3">
                                                                        <div class="col-12">
                                                                            <label class="form-label mr-1"
                                                                                for="kel_nama">Nama Lengkap
                                                                            </label><span class="mr-4 mb-3"
                                                                                style="color: red">*</span>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Nama Lengkap "
                                                                                name="kel_nama"
                                                                                value="{{ $item->kel_alamat }}"
                                                                                class="form-control @error('kel_nama') is-invalid @enderror">
                                                                            @error('kel_nama')<div
                                                                                class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div> @enderror
                                                                        </div>

                                                                        {{-- <div class="col-12">
                                                                            <label class="small mb-1 mr-1"
                                                                                for="id_hub_keluarga">Hubungan
                                                                                Keluarga</label><span class="mr-4 mb-3"
                                                                                style="color: red">*</span>
                                                                            <select class="form-select"
                                                                                name="id_hub_keluarga"
                                                                                id="id_hub_keluarga"
                                                                                value="{{ old('id_hub_keluarga') }}"
                                                                                class="form-control @error('id_hub_keluarga') is-invalid @enderror">
                                                                                <option>Pilih Hubungan Keluarga
                                                                                </option>
                                                                                @foreach ($hubungan as $item)
                                                                                <option
                                                                                    value="{{ $item->id_hub_keluarga }}">
                                                                                    {{ $item->hubungan_keluarga }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('id_hub_keluarga')<div
                                                                                class="text-danger small mb-1">
                                                                                {{ $message }}
                                                                            </div> @enderror
                                                                        </div> --}}

                                                                        <div class="col-4">
                                                                            <label class="small mb-1 mr-1"
                                                                                for="kel_tempat_lahir">Tempat
                                                                                Lahir</label><span class="mr-4 mb-3"
                                                                                style="color: red">*</span>
                                                                            <input class="form-control"
                                                                                id="kel_tempat_lahir" type="text"
                                                                                name="kel_tempat_lahir"
                                                                                placeholder="{{ $item->alamat }}"
                                                                                value="{{$item->kel_tempat_lahir}}"
                                                                                class="form-control @error('kel_tempat_lahir') is-invalid @enderror" />
                                                                            @error('tempat_lahir')<div
                                                                                class="text-danger small mb-1">
                                                                                {{ $message }}
                                                                            </div> @enderror
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label class="small mb-1 mr-1"
                                                                                for="kel_tanggal_lahir">Tanggal
                                                                                Lahir</label><span class="mr-4 mb-3"
                                                                                style="color: red">*</span>
                                                                            <input class="form-control"
                                                                                id="kel_tanggal_lahir" type="date"
                                                                                name="kel_tanggal_lahir"
                                                                                placeholder="Input Tanggal Lahir"
                                                                                value="{{ $item->kel_tanggal_lahir }}"
                                                                                class="form-control @error('kel_tanggal_lahir') is-invalid @enderror" />
                                                                            @error('kel_tanggal_lahir')
                                                                                <div class="text-danger small mb-1">
                                                                                {{ $message }}
                                                                                </div> @enderror
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label class="small mb-1 mr-1"
                                                                                for="kel_alamat">Alamat
                                                                                Lengkap</label><span class="mr-4 mb-3"
                                                                                style="color: red">*</span>
                                                                            <textarea class="form-control"
                                                                                id="kel_alamat" type="text" rows="3"
                                                                                cols="4" name="kel_alamat"
                                                                                placeholder="Input Alamat Pegawai"
                                                                                value="{{ $item->kel_nama }}"
                                                                                class="form-control @error('kel_alamat') is-invalid @enderror"></textarea>
                                                                            @error('kel_alamat')<div
                                                                                class="text-danger small mb-1">
                                                                                {{ $message }}
                                                                            </div> @enderror
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault" required>
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Data yang Anda inputkan
                                                                                    sudah sesuai
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <button class="btn btn-primary px-4"
                                                                                type="submit">Ubah Data
                                                                                Data</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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


@forelse ($riwayat as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_riwayat_keluarga }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Hapus Data Riwayat Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('riwayat-keluarga.destroy', $item->id_riwayat_keluarga) }}" method="POST"
                class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-white">
                    Apakah Anda Yakin Menghapus Data Riwayat Keluarga atas nama {{ $item->kel_nama }} ?</div>
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
