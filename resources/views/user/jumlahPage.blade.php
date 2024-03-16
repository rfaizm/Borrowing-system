    <!-- MODAL -->
@extends('layout.navbarUser')
@section('title','Peminjaman')
@section('cssTambahan','css/barang.css')

@section('content')


    <form action="/kirim/{{$barangDetail->id}}/{{$dataIdPinjam}}" method="post">
        @csrf
        <div class="container pt-3">
            <div class="text-center">
                <img class="rounded-4" src="/fotoBarang/{{ $barangDetail->foto_barang }}" style="width: 200px; height: 200px;" alt="">
            </div>
            <div class="ms-3 mb-3">
                <p class="fs-2 fw-bold text-center pt-2">{{$barangDetail['nama_barang']}}</p>
                <p class="fs-5 text-center">Stok : {{$barangDetail['stok_barang']}}</p>
                <p class="fs-5 text-center">Keterangan : {{$barangDetail['keterangan_barang']}}</p>
                <div class="mx-5 d-flex justify-content-center">
                    <label for="inputJumlah" class="fs-5 me-2">Jumlah : </label>
                    <input type="number" name="jumlah" class="form-control col-form-label" style="width: 20%;" id="inputJumlah" required>
                </div>
                <div class="mt-4 mx-5 d-flex justify-content-center" style="margin-bottom: 50px;">
                    <button onclick="return confirm('Apakah anda yakin ingin menambahkan barang ini ?')" class="px-4 btn btn-success w-auto" data-bs-toggle="modal" type="submit" data-bs-target="#exampleModal">Tambah</button>
                </div>
            </div>
        </div>
    </form>

@endsection
  <!-- END MODAL -->
