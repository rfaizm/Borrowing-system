@extends('layout.navbarAdmin')
@section('title', 'UpdateProfile')

@section('content')
    <!-- CONTENT -->
   <!-- JUMBOTRON -->
   <div class="container text-center" style="padding: 40px;">
   <img src="/fotoSiswa/{{ $profile->foto_profil }}" class="rounded-circle float-center" alt="..." style="width: 200px; height: 200px;">
   </div>
  <!-- END JUMBTRON -->
  
  
  <!-- START FORM -->
  <div class="container pt-3 text-start" style="width: 60%;">
    <form action="/editProfile/{{ $profile->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3 row">
        <label for="inputNama" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $profile->nis }}" name="nis" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputStok" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $profile->nama }}" name="nama" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="kelas" value="{{ $profile->kelas }}" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="email" id="inputPassword" value="{{ $profile->email }}">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputKeterangan" class="col-sm-2 col-form-label">Foto Profile</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="foto" id="inputPassword">
        </div>
      </div>
      
      <div class="text-center" style="padding-top: 0.5cm; padding-bottom: 50px;">
        <button class="btn btn-danger w-25" style="margin-right: 1cm;" onclick="cancelUpdate(event)">Batal</button>
        <button class="btn btn-success w-25">Update</button>
      </div>
    </form>
  </div>
  
  <!-- END FORM -->
  <script>
    function cancelUpdate(event) {
      event.preventDefault(); // Prevent the form from being submitted
      window.location.href = "/profile/{{ $profile->id }}"; // Redirect to the specified URL
    }
  </script>

  @endsection