<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index(){
        // buat menampilkan riwayat peminjaman
        // $tolak = Peminjaman::where('status_pinjaman', 'Selesai')->orWhere('status_pinjaman', 'Ditolak')->get();
        $detail = Peminjaman::where('status_pinjaman', 'Selesai')->orWhere('status_pinjaman', 'Ditolak')->orderBy('id', 'DESC')->with('detailPinjaman.barangDetail', 'siswa')->paginate(10);
        return view('admin.riwayatPinjam', ['detailList' => $detail]);
    }

    public function create(){

        return view('user.peminjaman');
    }

    public function store(Request $request, $id){

        $request['status_pinjaman'] = 'Belum Acc';
        $request['id_siswa'] = $id;
        $peminjaman = Peminjaman::create($request->all());

        return redirect()->route('barang-add', ['data' => $peminjaman]);
    }

    public function showAntri(){
        $antri = Peminjaman::where('status_pinjaman', 'Belum Acc')->orWhere('status_pinjaman', 'Sedang Berlangsung')->with('siswa', 'detailPinjaman.barangDetail')->get();
        return view('admin.adminPage', ['antrian' => $antri]);
    }

    public function updateAcc(Request $request, $id){
        $acc = Peminjaman::findOrFail($id);
        $cari = DetailPeminjaman::where('id_peminjaman', '=', $id);
        $cari = $cari->join('barang', 'detail_peminjaman.id_barang', '=', 'barang.id')->get();
        foreach ($cari as $user){
            Barang::findOrFail($user->id_barang)->update([
                'stok_barang' => $user->stok_barang - $user->jumlah
            ]);
        }

        $request['status_pinjaman'] = "Sedang Berlangsung";

        $acc->update([
            'status_pinjaman' => $request['status_pinjaman']
        ]);

        return redirect('tampilHomePage');
    }


    public function updateTol(Request $request, $id){
        $tolak = Peminjaman::findOrFail($id);
        $request['status_pinjaman'] = "Ditolak";

        $tolak->update([
            'status_pinjaman' => $request['status_pinjaman']
        ]);

        return redirect('tampilHomePage');
    }

    public function updateSel(Request $request, $id){
        $tolak = Peminjaman::findOrFail($id);
        $cari = DetailPeminjaman::where('id_peminjaman', '=', $id);
        $cari = $cari->join('barang', 'detail_peminjaman.id_barang', '=', 'barang.id')->get();
        foreach ($cari as $user){
            Barang::findOrFail($user->id_barang)->update([
                'stok_barang' => $user->stok_barang + $user->jumlah
            ]);
        }

        $request['status_pinjaman'] = "Selesai";

        $tolak->update([
            'status_pinjaman' => $request['status_pinjaman']
        ]);

        return redirect('tampilHomePage');
    }

    


}
