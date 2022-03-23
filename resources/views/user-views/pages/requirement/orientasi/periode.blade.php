@extends('user-views.layouts.app')


@section('name')
Atur Periode Orientasi
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Orientasi Calon Pegawai</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Atur Periode {{ $item->nama_lengkap }}</li>
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
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('peserta-orientasi.update', $item->id_calon_pegawai) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="nama_pengumuman">Nama Lengkap</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" value="{{ $item->nama_lengkap }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_pengumuman">Pendidikan Terakhir</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" value="{{ $item->pendidikan_terakhir }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_pengumuman">Jurusan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" value="{{ $item->jurusan }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="id_orientasi">Periode Orientasi</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_orientasi" id="id_orientasi"
                                            value="{{ old('id_orientasi') }}"
                                            class="form-control @error('id_orientasi') is-invalid @enderror">
                                            <option>Pilih Periode Orientasi</option>
                                            @foreach ($periode as $items)
                                            <option value="{{ $items->id_orientasi }}">{{ $items->periode_orientasi }}, Tanggal: {{ $items->tanggal_orientasi }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_orientasi')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="submit">Tambah Data</button>
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


<script>
    $(document).ready(function () {
        $('#validasierror').click();

        $('#harga_kelas').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailharga').html(nominal_fix);
        })

    });
</script>


@endsection
