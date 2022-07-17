@extends('user-views.layouts.app')


@section('name')
Edit Penilaian Pegawai
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Penilaian
                            {{ $item->Pegawai->nama_pegawai }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                @if(session('message'))
                <div
                    class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-danger"><i class="lni lni-close"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-danger"> {{ session('message') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('penilaian-diri.update', $item->id_penilaian) }}" method="POST" id="form1"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="col-2">
                                    <h5>Data Pegawai</h5>
                                    <hr>
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama
                                                Penilai</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName" name="id_penilai"
                                                    placeholder="Enter Your Name"
                                                    value="{{ Auth::user()->Pegawai->nama_pegawai }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Atasan
                                                Penilai</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEnterYourName"
                                                    placeholder="Enter Your Name" value="{{ $item->AtasanPenilai->nama_pegawai }}"
                                                    readonly>
                                                    <input type="text" class="form-control" id="inputEnterYourName" name="id_atasan_penilai"
                                                    placeholder="Enter Your Name" value="{{ $item->AtasanPenilai->id_pegawai }}" style="display: none"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="id_pegawai">Pegawai</label>
                                        <input class="form-control" type="text"
                                            value="{{ $item->Pegawai->nama_pegawai }}" readonly />
                                            <input class="form-control" id="id_pegawai" type="text" name="id_pegawai" style="display: none"
                                            value="{{ $item->Pegawai->id_pegawai }}" readonly />
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="periode_mulai">Periode Mulai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="periode_mulai" type="date" name="periode_mulai"
                                            placeholder="Input Tanggal Lahir" value="{{ $item->periode_mulai }}"
                                            class="form-control @error('periode_mulai') is-invalid @enderror" />
                                        @error('periode_mulai')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="periode_akhir">Periode Akhir</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="periode_akhir" type="date" name="periode_akhir"
                                            placeholder="Input Tanggal Lahir" value="{{ $item->periode_akhir }}"
                                            class="form-control @error('periode_akhir') is-invalid @enderror" />
                                        @error('periode_akhir')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                </div>
                        </div>

                        <div class="border p-3 rounded mt-4">
                            <div class="row">
                                <div class="col-2">
                                    <h5>Nilai Pegawai</h5>
                                    
                                    <hr>
                                </div>
                                <div class="col-8">

                                </div>
                                <div class="col-2">
                                    Keterangan:<br><span style="color: grey">Skala Nilai 1 - 100</span></br>
                                </div>
                            </div>
                            

                            <div class="row g-3">
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_tanggung_jawab">Tanggung Jawab</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_tanggung_jawab" type="number"
                                        name="nilai_tanggung_jawab" placeholder="Input Nilai Orientasi Pelayanan"
                                        value="{{ $item->nilai_tanggung_jawab }}" min="1" max="100"
                                        class="form-control @error('nilai_tanggung_jawab') is-invalid @enderror" />
                                    @error('nilai_tanggung_jawab')<div class="text-danger small mb-1">
                                        {{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_integritas">Integritas</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_integritas" type="number"
                                        name="nilai_integritas" placeholder="Input Nilai Integritas"
                                        value="{{ $item->nilai_integritas }}" min="1" max="100"
                                        class="form-control @error('nilai_integritas') is-invalid @enderror" />
                                    @error('nilai_integritas')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_komitmen">Komitmen</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_komitmen" type="number" name="nilai_komitmen"
                                        placeholder="Input Nilai Komitmen" value="{{ $item->nilai_komitmen }}" min="1" max="100"
                                        class="form-control @error('nilai_komitmen') is-invalid @enderror" />
                                    @error('nilai_komitmen')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_disiplin">Disiplin</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_disiplin" type="number" name="nilai_disiplin"
                                        placeholder="Input Nilai Disiplin" value="{{ $item->nilai_disiplin }}" min="1" max="100"
                                        class="form-control @error('nilai_disiplin') is-invalid @enderror" />
                                    @error('nilai_disiplin')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_kerjasama">Kerjasama</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_kerjasama" type="number"
                                        name="nilai_kerjasama" placeholder="Input Nilai Kerjasama"
                                        value="{{ $item->nilai_kerjasama }}" min="1" max="100"
                                        class="form-control @error('nilai_kerjasama') is-invalid @enderror" />
                                    @error('nilai_kerjasama')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_sikap">Sikap</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_sikap" type="number" name="nilai_sikap"
                                        placeholder="Input Nilai Prakarsa" value="{{ $item->nilai_sikap }}" min="1" max="100"
                                        class="form-control @error('nilai_sikap') is-invalid @enderror" />
                                    @error('nilai_sikap')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_kepemimpinan">Kepemimpinan</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_kepemimpinan" type="number"
                                        name="nilai_kepemimpinan" placeholder="Input Nilai Kepemimpinan"
                                        value="{{ $item->nilai_kepemimpinan }}" min="1" max="100"
                                        class="form-control @error('nilai_kepemimpinan') is-invalid @enderror" />
                                    @error('nilai_kepemimpinan')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Klik untuk menjumlahkan nilai</label><span
                                        class="mr-4 mb-3" style="color: red">*</span><br>
                                    <button class="btn btn-sm btn-primary" onclick="hitung()" type="button"
                                        id="button_nilai">Mulai Penilaian</button></br>

                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1" for="nilai_total">Nilai Total</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_total" type="number" name="nilai_total"
                                        placeholder="Otomatis Terhitung" value="{{ $item->nilai_total }}" 
                                        class="form-control @error('nilai_total') is-invalid @enderror" readonly />
                                    @error('nilai_total')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1" for="nilai_rata2">Rata-Rata</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_rata2" type="number" name="nilai_rata2"
                                        placeholder="Otomatis Terhitung" value="{{ $item->nilai_rata2 }}"
                                        class="form-control @error('nilai_rata2') is-invalid @enderror" readonly />
                                    @error('nilai_rata2')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="small mb-1 mr-1" for="catatan_penilaian">Catatan Penilaian</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <textarea class="form-control" id="catatan_penilaian" type="text" name="catatan_penilaian"
                                        placeholder="input Catatan Penilaian untuk Pegawai" value="{{ $item->catatan_penilaian }}"
                                        class="form-control @error('catatan_penilaian') is-invalid @enderror">{{ $item->catatan_penilaian }}</textarea>
                                    @error('catatan_penilaian')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                



                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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



<script>
    function hitung() {
        var form = $('#form1')
        var nilai_tanggung_jawab = $('#nilai_tanggung_jawab').val()
        var nilai_integritas = $('#nilai_integritas').val()
        var nilai_komitmen = $('#nilai_komitmen').val()
        var nilai_disiplin = $('#nilai_disiplin').val()
        var nilai_kerjasama =$('#nilai_kerjasama').val()
        var nilai_sikap = $('#nilai_sikap').val()
        var nilai_kepemimpinan = $('#nilai_kepemimpinan').val()
        console.log(nilai_kepemimpinan)

        if (nilai_tanggung_jawab == null | nilai_tanggung_jawab == 0 |  nilai_integritas == null |
            nilai_integritas == 0 |  nilai_komitmen == null | nilai_komitmen == 0 |  nilai_disiplin == null |
            nilai_disiplin == 0 |  nilai_kerjasama == null | nilai_kerjasama == 0 |  nilai_sikap == null |
            nilai_sikap == 0 |  nilai_kepemimpinan == null | nilai_kepemimpinan == 0  ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Nilai Kosong',
            })
        } else if(nilai_tanggung_jawab > 100 | nilai_integritas > 100 | nilai_komitmen > 100 | nilai_disiplin > 100 | nilai_kerjasama > 100 | nilai_sikap > 100 | nilai_kepemimpinan > 100){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nilai Tidak Boleh Melebihi Skala Nilai',
            })
        }else {

            var nilai_total = parseInt(nilai_tanggung_jawab) + parseInt(nilai_integritas) + parseInt(
                    nilai_komitmen) +
                parseInt(nilai_disiplin) + parseInt(nilai_kerjasama) + parseInt(nilai_sikap) + parseInt(
                    nilai_kepemimpinan)
            $('#nilai_total').val(nilai_total);

            var rata = nilai_total / 7;
            var rata_rata = rata.toFixed(2)
            $('#nilai_rata2').val(rata_rata);

        }
    }

</script>
@endsection
