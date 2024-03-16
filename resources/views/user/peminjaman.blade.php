@extends('layout.navbarUser')
@section('title','Peminjaman')
@section('cssTambahan','css/barang.css')


@section('content')

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="container bg-white rounded-4 my-5">
          <div class="row">
            <!-- FORM -->
            <form class="row g-3" action="peminjaman/{{Auth::user()->id}}" method="post">
              @csrf
              <div class="col-md-6 d-flex">
                <label for="tanggal" class="form-label mt-2 mx-2">Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                <input type="date" class="form-control" id="tgl_pinjaman" name="tgl_pinjaman" style="width: 70%; height: 45px" required>
              </div>
              <div class="col-md-6 d-flex">
                <label for="mulai" class="form-label mt-2 mx-2">Jam : </label>
                <input type="time" class="form-control" id="waktu_pinjam" name="waktu_pinjam" style="width: 35%; height: 45px" required>
                <label for="selesai" class="form-label mt-2 mx-2">Hingga : </label>
                <input type="time" class="form-control" id="waktu_kembali" name="waktu_kembali" style="width: 35%; height: 45px" required>
              </div>
              <div class="col-md-6 d-flex pt-4">
                <label for="tanggal" class="form-label mt-2 mx-2">No. Telepon &nbsp;: </label>
                <input type="number" class="form-control" id="no_telp" name="no_telp" style="width: 70%; height: 45px " placeholder="Contoh : 0812XXXXXXXX" required>
              </div>
              <div class="col-md-6 d-flex pt-4">
                <label for="tanggal" class="form-label mt-2 mx-2">Keterangan : </label>
                <input type="text" class="form-control" id="keperluan" name="keperluan" style="width: 74%; height: 45px" required>
              </div>
              <div class="input-group mt-5 custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="check" value="" onclick="enable()">
                <label class="ms-3 custom-control-label" for="check">Saya menyetujui <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#formModal">syarat dan ketentuan</a> yang berlaku</label>
              </div>
              <div class="input-group mt-3 custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="check2" value="" onclick="enable()">
                <label for="check2" class="ms-3 custom-control-label">Saya akan bertanggung jawab apabila terjadi kerusakan atau kehilangan</label>
              </div>
              <div class="d-flex justify-content-end pe-5 pb-4 " style="margin-top: -25px;">
                <button disabled="true" id="btn" type="submit" class="fs-4 btn text-white fw-semibold" style="background-color: #dd5353;">Pilih Barang</button>
              </div>
            </form>
            <!-- END FORM -->
          </div>
        </div>
      </div>
      <!-- END CONTENT -->
  
      <!-- MODAL -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Syarat dan Ketentuan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>1. Barang yang dipinjam hanya digunakan untuk kebutuhan kegiatan akademis</p>
              <p>2. Barang yang dipinjam hanya dapat digunakan di lingkungan sekolah, tidak diperkenankan untuk dibawa pulang</p>
              <p>3. Barang harus dikembalikan di hari yang sama ketika meminjam barang</p>
              <p>4. Peminjam harus bertanggung jawab terhadap barang yang dipinjam apabila ada kerusakan atau kehilangan</p>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL -->
  
      <script src="js/spinner.js"></script>

@endsection