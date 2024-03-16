@extends('layout.navbarAdmin')
@section('title', 'listBarang')

@section('content')
    <!-- CONTENT -->
   <!-- JUMBOTRON -->
   <div class="banner pb-3" style="padding-top: 3%;">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-sm-12 col-md-8 text-center text-md-start my-auto">
          
          <h1 class ="text-start fs-1 fw-bold" style="color: #000000;">List Barang</h5>
        </div>
          <div style="padding-top: 0.5cm;">
            <a href="/addBarang"> <button class="btn btn-danger w-25" type="submit" style="margin-right: 1cm;">Tambah</button> </a>
            <!-- <button class="btn btn-danger w-25">Lihat Jadwal</button> -->
          </div>
      </div>
    </div>
  </div>
  <!-- END JUMBTRON -->

  <!-- START TABEL LIST BARANG -->

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
              <th class="text-center">Gambar</th>
              <th class="text-center">Nama Barang</th>
              <th class="text-center">Stok</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Aksi</th>
          </tr>
      </thead>

      <tbody>
        @if(!$barang->isEmpty())
        @foreach ($barang as $item)
          <tr class="">
              <td class="text-center">
                <div class="card-img">
                  <img src="/fotoBarang/{{ $item->foto_barang }}" style="width: 100px; height: 100px;" alt="">
                </div>
              </td>
              <td class="m-auto text-center">{{ $item->nama_barang }}</td>
              <td class="text-center">{{ $item->stok_barang }}</td>
              <td class="text-center">{{ $item->keterangan_barang }}</td>
              <td class="text-center">
                <div>
                  <a class="fw-semibold "  aria-current="page" href="/updateBarang/{{ $item->id }}" style=" color:green;">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                  <!-- <form class="d-inline-block" action="/deleteBarang/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="fw-semibold border-0" onclick="return confirm('Apakah yakin akan menghapus barang ini ?')"  type="submit" aria-current="page" href="/deleteBarang/{{ $item->id }}" style=" color:red;">
                      <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form> -->
                </div>
              </td>
          </tr>
          @endforeach
          @else
          <tr class="text-center">
            <td colspan="5">
              Belum ada barang yang dimasukkan
            </td>
          </tr>
          @endif
      </tbody>
    </table>
    {{ $barang->links() }}
  </div>
  <!-- END   TABEL LIST BARANG -->



@endsection
