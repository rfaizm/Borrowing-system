@extends('layout.navbarAdmin')
@section('title', 'Home')


@section('content')
    <!-- CONTENT -->
   <!-- JUMBOTRON -->
   <div class="banner" style="padding-top: 3%; padding-bottom: 5%;">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-sm-12 col-md-8 text-center text-md-start my-auto">
          <h1 class ="text-start" style="color: #000000;">SELAMAT DATANG</h1>
          <h1 class ="text-start" style="color: #000000;">Admin!</h1>
          <h5 class ="text-start" style="color: #000000;">Mengajukan permohonan peminjaman barang menjadi lebih mudah berkat SIMAVI, platform inovatid yang memberikan kemudahan dan kenyamanan untuk penggunanya</h5>
        </div>
        <form action="">
          <div style="padding-top: 0.5cm;">
            <button class="btn btn-danger w-25" style="margin-right: 1cm;">Lihat Antrian</button>
            <button class="btn btn-danger w-25">Lihat Jadwal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END JUMBTRON -->
  <p class="text-center fs-1 fw-bold">Antrian</p>
  <style>
    .action-button {
      background-color: transparent;
      border: none;
      text-decoration: underline;
      cursor: pointer;
      font-weight: bolder;
    }
  </style>

  <div style="padding-left: 1.5cm; padding-right: 1.5cm;">
    <table class="table table-striped table-hover">
      <thead class="table-danger">
          <tr>
              <th>Waktu Antri</th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Waktu Peminjaman</th>
              <th>Keperluan</th>
              <th>Aksi</th>
          </tr>
      </thead>

      <tbody>
          <tr>
              <th>Selasa, 12 Maret 2023 | 07:10</th>
              <th>Dicki | 12 DKV 1</th>
              <th>Kamera, Stabilizer</th>
              <th>Sabtu, 1 April 2023 | 09:00-10:00</th>
              <th>Praktikum</th>
              <th><button class="action-button" style="margin-right: 0.5cm; color: green;">Acc</button>
                <button class="action-button" style="color: red;">Tolak</button>
              </th>
          </tr>

          <tr>
              <th>2. </th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Waktu Peminjam</th>
              <th>Keperluan</th>
              <th><button class="action-button" style="margin-right: 0.5cm; color: green;">Acc</button>
                <button class="action-button" style="color: red;">Tolak</button>
              </th>
          </tr>

          <tr>
              <th>3. </th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Waktu Peminjam</th>
              <th>Keperluan</th>
              <th><button class="action-button" style="margin-right: 0.5cm; color: green;">Acc</button>
                <button class="action-button" style="color: red;">Tolak</button>
              </th>
          </tr>
      </tbody>
    </table>
  </div>
  <!-- PAGINATION -->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" style="color: #990000;">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" style="background-color:#990000; color:#ffffff"href="#Antrian">1</a></li>
      <li class="page-item"><a class="page-link" style="color:#990000" href="#Antrian">2</a></li>
      <li class="page-item"><a class="page-link" style="color:#990000"href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" style="color:#990000" href="#Antrian">Next</a>
      </li>
    </ul>
  </nav>
  <!-- END PAGINATION -->

  <p class="text-center fs-1 fw-bold" style="padding-top: 3%;">Jadwal Peminjaman</p>
  <div style="padding-left: 1.5cm; padding-right: 1.5cm;">
    <table class="table table-striped table-hover">
      <thead class="table-danger">
          <tr>
              <th>No.</th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Waktu Peminjam</th>
              <th>Keperluan</th>
              <th>Kontak</th>
          </tr>
      </thead>

      <tbody>
          <tr>
              <th>1. </th>
              <th>Dicki</th>
              <th>Kamera</th>
              <th>Sabtu, 1 April 2023 | 09:00-10:00</th>
              <th>Praktikum</th>
              <th>08123456789</th>
          </tr>

          <tr>
              <th>2. </th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Waktu Peminjam</th>
              <th>Keperluan</th>
              <th>Kontak</th>
          </tr>

          <tr>
              <th>3. </th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Waktu Peminjam</th>
              <th>Keperluan</th>
              <th>Kontak</th>>
          </tr>
      </tbody>
    </table>
  </div>
  <!-- PAGINATION -->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" style="color: #990000;">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" style="background-color:#990000; color:#ffffff"href="#JadwalPeminjaman">1</a></li>
      <li class="page-item"><a class="page-link" style="color:#990000" href="#JadwalPeminjaman">2</a></li>
      <li class="page-item"><a class="page-link" style="color:#990000"href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" style="color:#990000" href="#JadwalPeminjaman">Next</a>
      </li>
    </ul>
  </nav>
  <!-- END PAGINATION -->

  <!-- FOOTER -->
  <div class="text-center py-2" style="background-color: #505050;">
    <div class=" fw-bolder fs-2 ">
      <span style="color: white;" >SIMAVI |</span> <span style="color: #ffee63;" >DKV</span>
    </div>
    <div class="my-2">
      <p style="color:white;">Copyright 2023 All rights reserved | DKV SMKN 3 Bandung</p>
    </div>
  </div>
@endsection
  