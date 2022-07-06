@extends('user-views.layouts.app')


@section('name')
Edit Data Usulan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Usulan Mutasi Pegawai</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
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
                            <form action="{{ route('usulan-mutasi.update', $item->id_usulan) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="jenis_mutasi">Jenis Mutasi</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="jenis_mutasi" id="jenis_mutasi" class="form-select"
                                            value="{{ old('jenis_mutasi') }}"
                                            class="form-control @error('jenis_mutasi') is-invalid @enderror">
                                            <option value="{{ $item->jenis_mutasi }}">{{ $item->jenis_mutasi }}</option>
                                            <option value="Internal">Internal</option>
                                            <option value="Promosi Pangkat">Promosi Pangkat</option>
                                            <option value="Demosi Pangkat">Demosi Pangkat</option>
                                            <option value="Promosi Jabatan">Promosi Jabatan</option>
                                            <option value="Demosi jabatan">Demosi jabatan</option>
                                        </select>
                                        @error('jenis_mutasi')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-8">
                                        <label class="small mb-1 mr-1" for="id_pegawai">Pegawai diusulkan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_pegawai" id="id_pegawai"
                                            value="{{ old('id_pegawai') }}"
                                            class="form-control @error('id_pegawai') is-invalid @enderror">
                                            <option value="{{ $item->Pegawai->id_pegawai }}">{{ $item->Pegawai->nama_pegawai }}</option>
                                            @foreach ($pegawai as $item)
                                            <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="alasan_usulan">Alasan Usulan Mutasi</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea type="text" class="form-control" placeholder="Alasan Usulan Mutasi Pegawai"
                                            name="alasan_usulan" value="{{ old('alasan_usulan') }}"
                                            class="form-control @error('alasan_usulan') is-invalid @enderror"> {{ $item->alasan_usulan }} </textarea>
                                        @error('alasan_usulan')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="submit">Edit Data</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>




@endsection
