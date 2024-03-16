<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\Session;

class DetailPeminjamanController extends Controller
{
    
    public function destroy($id, $id_pinjam)
    {
        $barang = DetailPeminjaman::findOrFail($id);
        $barang->delete();

        if($barang){
            Session::flash('statusSukses', 'sukses');
            Session::flash('message', 'Data berhasil dihapus');
        }

        return redirect()->route('barang-add', ['data' => $id_pinjam]);
    }
}
