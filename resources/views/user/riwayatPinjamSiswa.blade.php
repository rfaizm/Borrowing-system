@extends('layout.navbarUser')
@section('title','Riwayat Peminjaman')

@section('content')
    <!-- CONTENT -->
    <div class="container pt-3">
        <p class="text-center fs-1 fw-bold">Riwayat Peminjaman Siswa</p>
        <table class="table table-striped table-hover">
          <thead style="background-color: #dd5353;">
              <tr class="text-white">
                  <th class="py-3">No.</th>
                  <th class="py-3">Barang</th>
                  <th class="py-3">Waktu Pinjam</th>
                  <th class="py-3">Keperluan</th>
                  <th class="py-3">Status</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($listRiwayat as $user)
                @foreach ($user->pinjaman as $pinjaman)
                  @if (($pinjaman->status_pinjaman == 'Selesai') || ($pinjaman->status_pinjaman == 'Ditolak'))
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td>
                        @foreach ($pinjaman->detailPinjaman as $detailPinjaman)
                            {{ $detailPinjaman->barangDetail->nama_barang }}
                            <br>
                        @endforeach
                      </td>
                      <td>{{ $pinjaman->waktu_pinjam }} - {{ $pinjaman->waktu_kembali }}</td>
                      <td>{{ $pinjaman->keperluan }}</td>
                      <td>{{ $pinjaman->status_pinjaman }}</td>
                    </tr>
                  @endif
                @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- {{ $listRiwayat->links() }} --}}
      <!-- END CONTENT -->
  
@endsection