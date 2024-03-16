@extends('layout.navbarUser')
@section('title','Peminjaman')
@section('cssTambahan','css/barang.css')


@section('content')
        @if (Session::has('statusGagal'))
          <div class="alert alert-danger">
              {{ Session::get('message') }}
          </div>
        @elseif(Session::has('statusSukses'))
          <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="container">
          <div class="row pt-4">
            <div class="col text-center">
              <h1 class="fw-bold my-2">Peminjaman</h1>
              <p>Harap pinjam sesuai dengan kebutuhan anda</p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row pt-4 justify-content-evenly">

            @foreach ($BarangList as $item)
            <div class="col-sm-6 col-lg-3 pb-4  ">
              <div class="mx-auto text-center bg-white rounded-5" style="width: 80%;">
                <img class="mt-3" src="fotoBarang/{{$item->foto_barang}}" style="width: 200px; height: 200px;" alt="">
                <h3 class="my-2">{{$item->nama_barang}}</h3>
                <p>Jumlah : {{$item->stok_barang}}</p>


                  <a href="/barangAdd/{{$item->id}}/{{$dataList}}">
                    <button class="btn btn-success w-auto" >
                      Tambah
                    </button>
                  </a>

                  </div>
                </div>

                @endforeach
              </div>
              {{-- {{$meki}} --}}
        </div>
        {{-- @dd($detailPinjam->isEmpty()) --}}
        @if(!$detailPinjam->isEmpty())
        <div class="container bg-white rounded-4 my-5">
          <div class="row">
            <div class="col">
              <table class="table">
                <thead style="background-color: #dd5353;">
                  <tr>
                    <th scope="col" class="">
                      <p class="ms-2 fs-5 mt-3 text-white">Barang Dipinjam</p>
                    </th>
                    <th scope="col" class="">
                      <p class="mt-3 fs-5 text-white text-center">Jumlah</p>
                    </th>
                    <th scope="col" class="">
                      <p class="mt-3 fs-5 text-white text-center">Aksi</p>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($detailPinjam as $item)
                  <tr class="my-3" style="height: 90px; background-color: #eee;">
                    <td class="d-flex text-center" >
                      <img src="fotoBarang/{{ $item->barangDetail->foto_barang }}" alt="" style="height: 100px; width: 100px;">
                      <p class="fs-5 my-auto ms-3 fw-semibold">{{ $item->barangDetail->nama_barang }}</p>
                    </td>
                    <td class="td-edit fs-5 text-center " style="padding-top: 40px;" >{{ $item->jumlah }}</td>
                    <td class="td-edit fs-5 text-center " style="padding-top: 40px;" >
                      <form action="/deleteDetailBarang/{{ $item->id }}/{{ $dataList }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                          <a  onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')" class="nav-link active fw-semibold"  aria-current="page" href="#" style=" color:red;">
                            <i class="fa-solid fa-trash-can"></i>
                          </a>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="row">
            <div class="col-3 justify-content-end">
            </div>
            <div class="col-9 d-flex justify-content-end">
              <form action="/user">
                <button onclick="return confirm('Apakah anda sudah memilih barang sesuai kebutuhan?')" id="btn" type="submit" class="rounded fs-5 btn text-white fw-semibold" style="background-color: #259D1A;">Selesai</button>
              </form>
            </div>
          </div>
        </div>
        @endif

      </div>
      <!-- END CONTENT -->
      <script src="js/spinner.js"></script>

      @endsection

