@extends('layout.navbarAdmin')
@section('title','Riwayat Peminjaman')

@section('content')
    <!-- CONTENT -->

    <p class="text-center fs-1 fw-bold" style="padding-top: 40px;">Riwayat Peminjaman</p>
  <style>
    .action-button {
      background-color: transparent;
      border: none;
      text-decoration: underline;
      cursor: pointer;
      font-weight: bolder;
    }
  </style>

  <div class="container">
    <table class="table table-striped table-hover">
      <thead class="table-danger">
          <tr>
            <th class="text-center">Peminjam</th>
            <th class="text-center">Barang</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Keperluan</th>
            <th class="text-center">Status</th>
          </tr>
      </thead>

      <tbody>
        @if (!$detailList->isEmpty())
          @foreach ($detailList as $item)
          <tr>
            <td class="text-center">{{$item->siswa->nama}}</td>

            <td class="text-center">
            @foreach ($item->detailPinjaman as $data)
            {{ $data->jumlah }} x {{ $data->barangDetail->nama_barang }} <br>
            @endforeach
            </td>

            <td class="text-center">{{ date('d-m-Y',strtotime($item->tgl_pinjaman)) }} | {{ $item->waktu_pinjam }}</td>
            <td class="text-center">{{ date('d-m-Y',strtotime($item->updated_at)) }} | {{ date('H:i:s',strtotime($item->updated_at)) }}</td>
            <td class="text-center">{{$item->keperluan}}</td>
            <td class="text-center">{{$item->status_pinjaman}}</td>
          </tr>
            {{-- @endif --}}
          @endforeach
        @else
            <tr class="text-center">
              <td colspan="6">Belum ada riwayat peminjaman</td>
            </tr>
        @endif

      </tbody>
    </table>
    {{ $detailList->links() }}
  </div>
      <!-- END CONTENT -->

@endsection
