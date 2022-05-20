@extends('user-views.layouts.app')


@section('name')
{{-- Tukar Jadwal {{ $jadwal->tanggal_masuk }} --}}
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Jadwal Saya</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tukar Jadwal Tanggal</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Pilih jadwal pegawai yang ingin ditukar</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('jadwal-saya.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-10">
                                        <label class="small mb-1 mr-1" for="id_jadwal">Jadwal Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_jadwal" id="id_jadwal"
                                            value="{{ old('id_jadwal') }}"
                                            class="form-control @error('id_jadwal') is-invalid @enderror">
                                            <option>Pilih Jadwal</option>
                                            @foreach ($jadwal as $item)
                                            <option value="{{ $item->id_jadwal }}">Jadwal Pegawai {{ $item->pegawai->nama_pegawai }}, Shift {{ $item->ShiftKerja->jenis_shift }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="small" style="color: gray">
                                            Jadwal akan tertukar setelah disetujui pihak terkait
                                        </div>
                                        @error('id_jadwal')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Saya yakin ingin menukar jadwal tersebut
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="submit">Tukar Jadwal</button>
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
