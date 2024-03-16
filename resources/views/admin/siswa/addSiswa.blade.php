@extends('layout.navbarAdmin')
@section('title', 'Add Siswa')

@section('content')
  
  <!-- START FORM -->

  <div class="container pt-5">
    <h2 class="text-center fw-bold">Tambah Siswa</h2>
  </div>


  <div class="container pt-3 text-start" style="width: 60%;">
    <form action="/addSiswa" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 row">
        <label for="inputNama" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputStok" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nis" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password_siswa" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="kelas" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Foto Profil</label>
        <div class="col-sm-10">
          <input type="file" name="foto" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="text-center" style="padding-top: 0.5cm; padding-bottom: 50px;">
        <button class="btn btn-danger w-25" style="margin-right: 1cm;" onclick="cancelUpdate(event)">Batal</button>
        <button type="submit" class="btn btn-success w-25">Tambah</button>
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