@extends('layout.navbarUser')
@section('title','Profile')
@section('cssTambahan','css/barang.css')


@section('content')
<p class="text-center fs-1 fw-bold" style="padding-top: 50px;">Profile</p>
<div class="row">
  <div class="column pb-5">
    <div class="col-12 col-sm-10 col-md-10 m-auto">
        <div class="card p-3 shadow">
            <div class="card-body">
              <div class="container text-start">
                <div class="row text-start">
                  <div class="col">
                    <img src="/fotoSiswa/{{ $profile->foto_profil }}" class="rounded-circle mx-auto d-block" alt="..." width="200" height="200">
                  </div>
                  <div class="col pt-5">
                    <h5>Nama       : {{ $profile->nama }}</h5>
                    <h5>Nis        : {{ $profile->nis }}</h5>
                    <h5>Kelas      : {{ $profile->kelas }}</h5>
                    <h5>Email      : {{ $profile->email }}</h5>
                  </div>
                  <div class="col">
                  <!-- <div style="">
                    <button class="btn btn-success w-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
                  </div> -->
                    <a class="nav-link active fw-semibold" aria-current="page" href="/user5" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" color:green; float: right;">
                      <i class="fa-solid fa-pen" style="font-size: 25px"></i>
                      <!-- <i class="fa-circle-trash fa-beat-fade" style="font-size: 25px"></i> -->
                    </a>
                  </div>
                </div>
              <!-- </div> -->
            </div>
        </div>
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade @if(Session::has('statusFailSiswa')) show @endif" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" @if(Session::has('statusFailSiswa')) style="display: block;" @endif>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h1 class="modal-title fs-5 ; text-center" id="exampleModalLabel">Harap Verifikasi Dirimu!</h1>
      @if (Session::has('statusFailSiswa'))
        <div class="alert alert-danger">
            {{ Session::get('message') }}
        </div>
      @endif
      <h1 class="modal-title fs-5 ; text-center" id="exampleModalLabel1">Password :</h1>
      <div class="modal-body">
        <form action="/editProfile/{{ $profile->id }}" method="post">
          @csrf
          <div class="text-center">
            <input type="password" class="form-control" name="password" id="inputPassword" required>
          </div>
          <div class="text-center pt-3">
            <button class="btn btn-danger w-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Verifikasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

@endsection