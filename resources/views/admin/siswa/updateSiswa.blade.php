@extends('layout.navbarAdmin')
@section('title', 'Add Siswa')

@section('content')
  
  <div class="container pt-5">
    <h2 class="text-center fw-bold">Edit Siswa</h2>
  </div>
  <!-- JUMBOTRON -->
  <div class="container text-center" style="padding: 40px;">
    <img src="/fotoSiswa/{{ $siswa->foto_profil }}" class="rounded float-center" alt="..." style="width: 200px; height: 200px;">
    </div>
   <!-- END JUMBTRON -->

  <!-- START FORM -->
  


  <div class="container pt-3 text-start" style="width: 60%;">
    <form action="/updateSiswa/{{ $siswa->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3 row">
        <label for="inputNama" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ $siswa->nama }}" name="nama" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputStok" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ $siswa->nis }}" name="nis" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ $siswa->kelas }}" name="kelas" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" value="{{ $siswa->email }}" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Foto Profil</label>
        <div class="col-sm-10">
          <input type="file" name="foto" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="text-center" style="padding-top: 0.5cm; padding-bottom: 50px;">
        <!-- <a href="/tampilSiswa">
          <button class="btn btn-danger w-25" style="margin-right: 1cm;">Batal</button>
        </a> -->
        <button class="btn btn-danger w-25" style="margin-right: 1cm;" onclick="cancelUpdate(event)">Batal</button>
        <button type="submit" class="btn btn-success w-25">Update</button>
      </div>
    </form>
  </div>
  <!-- END FORM -->

  <script>
    function cancelUpdate(event) {
      event.preventDefault(); // Prevent the form from being submitted
      window.location.href = '/tampilSiswa'; // Redirect to the specified URL
    }
  </script>
  @endsection