<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function show(Request $request){
        if (isset($request->data)){
            $pass = $request->data;
            $barang = Barang::get();
            $detailPinjam = DetailPeminjaman::with('barangDetail')->where('id_peminjaman', $request->data)->get();

        }else{
            return redirect('/user2');
        }
        return view('user.peminjaman2',['BarangList'=> $barang, 'dataList' => $pass, 'detailPinjam' => $detailPinjam]);
    }


    public function try(Request $request, $id, $id_pinjam){
        
            $request['id_barang'] = $id;
            $request['id_peminjaman'] = $id_pinjam;
            $class = Barang::findOrFail($id);
            return view('user.jumlahPage', ['barangDetail' => $class, 'dataIdPinjam' => $id_pinjam]);
        
    }

    public function masukData(Request $request ,$id, $id_pinjam){
        $class = Barang::findOrFail($id);
        // dd(isset($request['jumlah']));
        
        if($request['jumlah'] == null){
            return redirect()->route('barang-add', ['data' => $id_pinjam]);
        }else if($request['jumlah'] > $class['stok_barang']){
            Session::flash('statusGagal', 'gagal');
            Session::flash('message', 'Jumlah masukkanmu melebihi stok!');
            return redirect()->route('barang-add', ['data' => $id_pinjam]);
        }
        else{
            $request['id_barang'] = $id;
            $request['id_peminjaman'] = $id_pinjam;
            $detail = DetailPeminjaman::create($request->all());
            Session::flash('statusSukses', 'sukses');
            Session::flash('message', 'Data berhasil ditambahkan');
            return redirect()->route('barang-add', ['data' => $id_pinjam]);
        }
    }

    public function index(){
        $barang= Barang::paginate(5);
        return view('admin.barang.tampilBarang', ['barang' => $barang]);
    }

    public function create(){
        return view('admin.barang.addBarang');
    }

    public function store(Request $request){
        $newName = '';
        if($request->file('foto')){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama_barang.'-'.now()->timestamp.'.'.$extension;
            // $request->file('foto')->storeAs('image', $newName);
            $request->file('foto')->move('fotoBarang', $newName);
        }

        $request['foto_barang'] = $newName;
        $barang = Barang::create($request->all());
        if($barang){
            Session::flash('status', 'sukses');
            Session::flash('message', 'Add data sukses');
        }
        return redirect('/tampilBarang');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        // dd($student);
        return view('admin.barang.updateBarang', ['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $newName = '';
        if(($request->file('foto'))){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama_barang.'-'.now()->timestamp.'.'.$extension;
            // $request->file('foto')->storeAs('image', $newName);
            $request->file('foto')->move('fotoBarang', $newName);
            $request['foto_profil'] = $newName;
            $siswa = Barang::findOrFail($id);
            

            $siswa->update([
                'nama_barang' => $request['nama_barang'],
                'keterangan_barang' => $request->keterangan_barang,
                'stok_barang' => $request->stok_barang,
                'foto_barang' => $request->foto_profil
            ]);
            if($siswa){
                Session::flash('status', 'sukses');
                Session::flash('message', 'update student sukses');
            }
        }
        else if((!$request->file('foto'))){
            $siswa = Barang::findOrFail($id); 
            $siswa->update([
                'nama_barang' => $request['nama_barang'],
                'keterangan_barang' => $request->keterangan_barang,
                'stok_barang' => $request->stok_barang,
            ]);
            if($siswa){
                Session::flash('status', 'sukses');
                Session::flash('message', 'update student sukses');
            }
        }
        else{
            Session::flash('status', 'sukses');
            Session::flash('message', 'update student gagal');
        }
        return redirect('/tampilBarang');
        // dd($request->all());
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        if($barang){
            Session::flash('status', 'sukses');
            Session::flash('message', 'delete student sukses');
        }

        return redirect('/tampilBarang');
    }

    
}

