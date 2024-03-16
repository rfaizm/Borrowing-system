@extends('layout.navbarAdmin')
@section('title','Riwayat Peminjaman')

@section('content')
    <!-- CONTENT -->

    <p class="text-center fs-1 fw-bold">Riwayat Peminjaman</p>
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
            <th class="text-center">Peminjam</th>
            <th class="text-center">Barang</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Keperluan</th>
          </tr>
      </thead>

      <tbody>
          @foreach ($detailList as $item)
              
          <tr>
            <th class="text-center">{{$item->siswa->nama}}</th>
            
            <th class="text-center">
            @foreach ($item->detailPinjaman as $data)
              {{$data->barangDetail->nama_barang}} <br>
            @endforeach
            </th>
            
            <th class="text-center">{{$item->tgl_pinjaman}}</th>
            
            <th class="text-center">{{$item->waktu_kembali}}</th>
            <th class="text-center">{{$item->keperluan}}</th>
          </tr>
          
          @endforeach
          
      </tbody>
    </table>
  </div>
      <!-- END CONTENT -->
  
       <!-- PAGINATION -->
       <nav aria-label="Page navigation example" style="color:#990000">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" style="color:#990000">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" style="color:#fbfbfb; background-color:#990000;" href="#JadwalPeminjaman">1</a></li>
          <li class="page-item"><a class="page-link" style="color:#990000" href="#RiwayatPeminjaman">2</a></li>
          <li class="page-item"><a class="page-link" style="color:#990000" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" style="color:#990000" href="#">Next</a>
          </li>
        </ul>
      </nav>
      <!-- END PAGINATION -->
@endsection