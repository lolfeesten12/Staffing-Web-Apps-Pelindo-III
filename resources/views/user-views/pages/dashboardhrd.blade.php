@extends('user-views.layouts.app')


@section('name')
Dashboard
@endsection

@section('content')



<main class="page-content">
    <div class="col py-2">
        <div class="card radius-15">
            <div class="card-body">
                <div class="float-end text-muted">Mon, Jan 9th 2020 7:00 AM</div>
                <h4 class="card-title text-muted">Selamat Datang, {{ Auth::user()->Pegawai->nama_pegawai }}</h4>
                <p class="card-text">Halaman dashboard menampilkan poin-poin penting mengenai kepegawaian pada aplikasi.</p>
            </div>
        </div>
    </div>
  
      
   
   

</main>
@endsection
