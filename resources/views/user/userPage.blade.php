@extends('layout.navbarUser')
@section('title','Jadwal Peminjaman')
@section('')
@php
  $tanda = 0;
  $panjang = 0;
@endphp

@section('content')
    <!-- CONTENT -->
     <!-- JUMBOTRON -->
     <div class="banner" style="padding-top: 8%; padding-bottom: 8%;">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col">
            <h1 class ="text-start" style="color: #000000; font-size: 55px;"><b>SELAMAT DATANG</b></h1>
            <h1 class ="text-start" style="color: #000000; font-size: 55px"><b>{{Auth::user()->nama}}</b></h1>
            <h5 class ="" style="-color: #000000; font-family: Arial; font-size: 24px; text-align: justify;">Mengajukan permohonan peminjaman barang menjadi lebih mudah berkat SIMAVI, platform inovatif yang memberikan kemudahan dan kenyamanan untuk penggunanya.</h5>
            <div style="padding-top: 0.5cm;">
              <a href="/user2">
                <button class="btn btn-danger w-25">Ajukan Pinjaman</button>
              </a>
            </div>
          </div>
          <div class="col">
            <img src="/img/Multimedia.png" alt="" style="width: 600px; height: 350px">
          </div>
        </div>
      </div>
    </div>
    <!-- END JUMBTRON -->
      <p class="text-center fs-1 fw-bold">Pengajuan Pinjamanmu</p>
      <style>
        .action-button {
          background-color: transparent;
          border: none;
          text-decoration: underline;
          cursor: pointer;
          font-weight: bolder;
        }
      </style>
      <div style="padding-bottom: 1.5cm;" class="mb-5 container">
        <table class="table table-striped table-hover">
          <thead style="background-color: #dd5353;">
              <tr class="text-white">
                  <th class="text-center">Barang</th>
                  <th class="text-center">Durasi Peminjaman</th>
                  <th class="text-center">Keperluan</th>
                  <th class="text-center">Kontak</th>
                  <th class="text-center">Batalkan Pengajuan</th>
              </tr>
          </thead>

          
          <tbody>
              @foreach ($siswa as $user)

                @foreach ($user->pinjaman as $pinjaman)
                  @if (($pinjaman->status_pinjaman == 'Belum Acc') && (!$pinjaman->detailPinjaman->isEmpty()))    
                    <tr class="text-center">
                      <td>
                        @foreach ($pinjaman->detailPinjaman as $detailPinjaman)
                            {{ $detailPinjaman->jumlah }} x {{ $detailPinjaman->barangDetail->nama_barang }}
                            <br>
                        @endforeach
                      </td>
                      <td>{{ date('d-m-Y',strtotime($pinjaman->tgl_pinjaman)) }} | {{ $pinjaman->waktu_pinjam }} - {{ $pinjaman->waktu_kembali }}</td>
                      <td>{{ $pinjaman->keperluan }}</td>
                      <td>{{ $pinjaman->no_telp }}</td>
                      <td>
                        <form action="/deleteAjuan/{{ $pinjaman->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn">
                            <a  onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')" class="nav-link active fw-semibold"  aria-current="page" href="/deleteAjuan/{{ $pinjaman->id }}" style=" color:red;">
                              <i class="fa-solid fa-trash-can"></i>
                            </a>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @else
                    @php
                      $tanda++;
                    @endphp
                  @endif
                @endforeach
            @endforeach
            <!-- @if ($tanda == 1)
              <tr>
                <td class="fw-semibold text-center text-muted" colspan="5">Kamu tidak sedang mengajukan apapun</td>
              </tr>
            @endif -->
          </tbody>
        </table>
      </div>
      <hr>
      <p class="text-center fs-1 fw-bold">Jadwal Peminjaman</p>
      <div class="container"">
        <table class="table table-striped table-hover">
          <thead thead style="background-color: #dd5353;">
              <tr class="text-white">
                <th class="text-center">Peminjam</th>
                <th class="text-center">Barang</th>
                  <th class="text-center">Durasi Peminjaman</th>
                  <th class="text-center">Keperluan</th>
                  <th class="text-center">Kontak</th>
              </tr>
          </thead>

          <tbody>
            @if ($dataList->isEmpty())
            <tr>
              <td class="fw-semibold text-center text-muted" colspan="5">Sedang tidak ada peminjaman yang berlangsung</td>
            </tr>
            @else
              @foreach ($dataList as $item)
                  <tr>
                    <td class="text-center">{{$item->siswa->nama}}</td>
                    <td class="text-center">
                    @foreach ($item->detailPinjaman as $data)
                      {{ $data->jumlah }} x {{ $data->barangDetail->nama_barang }} <br>
                    @endforeach
                    </td>
                    <td class="text-center">{{ date('d-m-Y',strtotime($item->tgl_pinjaman)) }} | {{ $item->waktu_pinjam }} - {{ $item->waktu_kembali }}</td>
                    
                    <td class="text-center">{{$item->keperluan}}</td>
                    <td class="text-center">{{$item->no_telp}}</td>
                  </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        {{ $dataList->links() }}
      </div>
      <!-- END CONTENT -->
      
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
