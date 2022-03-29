@extends('user-views.layouts.app')


@section('name')
Edit Data Pelatihan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Program Pelatihan</div>
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
                            <form action="{{ route('program-pelatihan.update', $item->id_pelatihan) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_pelatihan">Nama Pelatihan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Program Pelatihan"
                                            name="nama_pelatihan" value="{{ $item->nama_pelatihan }}"
                                            class="form-control @error('nama_pelatihan') is-invalid @enderror">
                                        @error('nama_pelatihan')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="jenis_pelatihan">Jenis Pelatihan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="jenis_pelatihan" id="jenis_pelatihan" class="form-select"
                                            value="{{ old('jenis_pelatihan') }}"
                                            class="form-control @error('jenis_pelatihan') is-invalid @enderror">
                                            <option value="{{ $item->jenis_pelatihan }}">{{ $item->jenis_pelatihan }}</option>
                                            <option value="Pelatihan">Pelatihan</option>
                                            <option value="Sertifikasi">Sertifikasi</option>
                                            <option value="Seminar">Seminar</option>
                                            <option value="Workshop">Workshop</option>
                                        </select>
                                        @error('jenis_pelatihan')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="small mb-1" for="cover_foto">Cover Foto Pelatihan</label>
                                        <input class="form-control" id="cover_foto" type="file" name="cover_foto"
                                            value="{{ old('cover_foto') }}" accept="image/*" multiple="multiple"
                                            class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                        <div class="small">
                                            <span class="text-muted">Accept Picture in PNG, JPG, JPEG Format </span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1" for="penyelenggara">Penyelenggara</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Penyelenggara Program Pelatihan"
                                            name="penyelenggara" value="{{ $item->penyelenggara }}"
                                            class="form-control @error('penyelenggara') is-invalid @enderror">
                                        @error('penyelenggara')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1" for="contact_info">Contact Info</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Penyelenggara Contact"
                                            name="contact_info" value="{{ $item->contact_info }}"
                                            class="form-control @error('contact_info') is-invalid @enderror">
                                        @error('contact_info')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="status_wajib">Status Wajib</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="status_wajib" id="status_wajib" class="form-select"
                                            value="{{ old('status_wajib') }}"
                                            class="form-control @error('status_wajib') is-invalid @enderror">
                                            <option value="{{ $item->status_wajib }}">{{ $item->status_wajib }}</option>
                                            <option value="Wajib">Wajib</option>
                                            <option value="Tidak Wajib">Tidak Wajib</option>
                                        </select>
                                        @error('status_wajib')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="periode_awal">Periode Mulai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="periode_awal" type="date" name="periode_awal"
                                            placeholder="Input Periode Mulai Pelatihan" value="{{ $item->periode_awal }}"
                                            class="form-control @error('periode_awal') is-invalid @enderror" />
                                        @error('periode_awal')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="periode_akhir">Periode Selesai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="periode_akhir" type="date" name="periode_akhir"
                                            placeholder="Input Periode Selesai Pelatihan" value="{{ $item->periode_akhir }}"
                                            class="form-control @error('periode_akhir') is-invalid @enderror" />
                                        @error('periode_akhir')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="biaya">Biaya</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="biaya" type="number" name="biaya"
                                            placeholder="Input Biaya Pelatihan" value="{{ $item->biaya }}"
                                            class="form-control @error('biaya') is-invalid @enderror" />
                                        @error('biaya')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="keterangan">Keterangan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="keterangan" type="text" name="keterangan" cols="5"
                                            placeholder="Input Keterangan Pelatihan" value="{{ $item->keterangan }}"
                                            class="form-control @error('keterangan') is-invalid @enderror">{{ $item->keterangan }}</textarea>
                                        @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Data yang Anda inputkan sudah sesuai
                                            </label>
                                        </div>
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
