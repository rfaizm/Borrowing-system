@extends('layout.navbarAdmin')
@section('title', 'Home')


@section('content')
    <!-- CONTENT -->
   <!-- JUMBOTRON -->
   <div class="banner" style="padding-top: 8%; padding-bottom: 8%;">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col">
            <h1 class ="text-start" style="color: #000000; font-size: 55px;"><b>SELAMAT DATANG</b></h1>
            <h1 class ="text-start" style="color: #000000; font-size: 55px"><b>Admin</b></h1>
            <h5 class ="" style="-color: #000000; font-family: Arial; font-size: 24px; text-align: justify;">Mengajukan permohonan peminjaman barang menjadi lebih mudah berkat SIMAVI, platform inovatif yang memberikan kemudahan dan kenyamanan untuk penggunanya.</h5>
          </div>
          <div class="col">
            <img src="/img/Multimedia.png" alt="" style="width: 600px; height: 350px">
          </div>
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

  <div class="container" >
    <table class="table table-striped table-hover">
      <thead class="table-danger">
          <tr>
              <th>Waktu Pengajuan</th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Durasi Peminjaman</th>
              <th>Keperluan</th>
              <th>Kontak</th>
              <th>Aksi</th>
          </tr>
      </thead>

      <tbody>
      @if (!$antrian->isEmpty())
        @foreach ($antrian as $item)
          @if ($item->status_pinjaman == 'Belum Acc')
            <tr>
                <td>{{ date('d-m-Y', strtotime($item->created_at)) }} | {{ date('H:i:s', strtotime($item->created_at)) }}</td>
                <td>{{ $item->siswa->nama }} | {{ $item->siswa->kelas }}</td>
                <td>
                    @foreach ($item->detailPinjaman as $data)
                    {{ $data->jumlah }} x {{ $data->barangDetail->nama_barang }} <br>
                    @endforeach
                </td>
                <td>{{ date('d-m-Y', strtotime($item->tgl_pinjaman)) }} | {{ substr($item->waktu_pinjam, 0, 5) }}-{{ substr($item->waktu_kembali, 0, 5) }} </td>
                <td>{{ $item->keperluan }}</td>
                <td>{{ $item->no_telp }}</td>
                <th>
                    <div class="button-container">
                      <form action="/acc/{{ $item->id }}" method="post" style="display: inline-block;">
                          @method('PUT')
                          @csrf
                          <button class="action-button" name="id" style="margin-right: 0.5cm; color: green;">
                            <i class="fas fa-check fa-2x" style="color: green;"></i>
                          </button>
                      </form>

                      <form action="/tolak/{{ $item->id }}" method="post" style="display: inline-block;">
                          @method('PUT')
                          @csrf
                          <button class="action-button" name="id" style="color: red;">
                            <i class="fas fa-times fa-2x" style="color: red;"></i>
                          </button>
                      </form>
                    </div>
                    
                </th>
            </tr>
            @endif
        @endforeach
      @else
        <td colspan="7" class="text-center">TIDAK ADA ANTRIAN SAAT INI</td>
      @endif

      </tbody>
    </table>
  </div>
  <div class="container">
    <hr>

  </div>
  <p class="text-center fs-1 fw-bold" style="padding-top: 3%;">Jadwal Peminjaman</p>
  <div class="container" >
    <table class="table table-striped table-hover">
      <thead class="table-danger">
          <tr>
              <th>No.</th>
              <th>Peminjam</th>
              <th>Barang</th>
              <th>Durasi Peminjaman</th>
              <th>Keperluan</th>
              <th>Kontak</th>
              <th>Aksi</th>
          </tr>
      </thead>

      <tbody>
      {{-- {{  $antrian}} --}}
      @if (!$antrian->isEmpty())
        @foreach ($antrian as $item)
            @if (($item->status_pinjaman == 'Sedang Berlangsung'))
            <tr>
                <th>{{ $loop->iteration }}.</th>
                <td>{{ $item->siswa->nama }} | {{ $item->siswa->kelas }}</td>
                <td>
                    @foreach ($item->detailPinjaman as $data)
                    {{ $data->jumlah }} x {{ $data->barangDetail->nama_barang }} <br>
                    @endforeach
                </td>
                <td>{{ date('d-m-Y', strtotime($item->tgl_pinjaman)) }} | {{ substr($item->waktu_pinjam, 0, 5) }}-{{ substr($item->waktu_kembali, 0, 5) }} </td>
                <td>{{ $item->keperluan }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>
                    <form action="/selesai/{{ $item->id }}" method="post">
                        @method('PUT')
                        @csrf
                        <button class="action-button" name="id" style="margin-right: 0.5cm; color: green;">Selesai</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
        @else
          <td colspan="8" class="text-center">TIDAK ADA PENGAJUAN PINJAMAN SAAT INI</td>
      @endif
      </tbody>
    </table>
  </div>
  <!-- PAGINATION -->
  
  <!-- END PAGINATION -->
  <!-- FOOTER -->
  <div class="text-center py-2" style="background-color: #505050;" >
      <div class=" fw-bolder fs-2 ">
        <span style="color: white;" >SIMAVI |</span> <span style="color: #FFE61A;" >DKV</span>
      </div>
      <div class="my-2">
        <p style="color:white;">Copyright ©2023 All rights reserved | DKV SMKN 3 Bandung</p>
      </div>
  </div>

@endsection
