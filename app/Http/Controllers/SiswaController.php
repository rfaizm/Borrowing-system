<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pinjaman;
use App\Models\DetailPinjaman;
use App\Models\BarangDetail;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index1(){
        $detail = Siswa::where('id', auth()->user()->id)->with('pinjaman.detailPinjaman.barangDetail')->get();
        $detail2 = Peminjaman::where('status_pinjaman', 'Sedang Berlangsung')->with('detailPinjaman.barangDetail', 'siswa')->paginate(5);
        return view('user.userPage', ['siswa'=>$detail, 'dataList'=>$detail2]);
    }

    public function index()
    {
        $siswa= Siswa::orderBy('nama', 'ASC')->paginate(10);
        return view('admin.siswa.tampilSiswa', ['siswa' => $siswa]);
    }

    public function riwayatSiswa()
    {
        $detail = Siswa::where('id', auth()->user()->id)->with('pinjaman.detailPinjaman.barangDetail')->orderBy('id', 'ASC')->get();
        return view('user.riwayatPinjamSiswa', ['listRiwayat' => $detail]);
    }

    public function create()
    {
        return view('admin.siswa.addSiswa');
    }

    public function store(Request $request)
    {   

        $newName = '';
        if($request->file('foto')){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
            // $request->file('foto')->storeAs('image', $newName);
            $request->file('foto')->move('fotoSiswa', $newName);
        }

        $hashPass = Hash::make($request['password_siswa']) ;
        $request['password'] = $hashPass;
        $request['foto_profil'] = $newName;
        $siswa = Siswa::create($request->all());
        if($siswa){
            Session::flash('status', 'sukses');
            Session::flash('message', 'Add data sukses');
        }
        return redirect('/tampilSiswa');
    }

    public function edit($id)
    {
        
        $siswa = Siswa::findOrFail($id);
        // dd($student);
        return view('admin.siswa.updateSiswa', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $newName = '';
        if(($request->file('foto'))){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
            // $request->file('foto')->storeAs('image', $newName);
            $request->file('foto')->move('fotoSiswa', $newName);
            $request['foto_profil'] = $newName;
            $siswa = Siswa::findOrFail($id);
            

            $siswa->update([
                'nama' => $request['nama'],
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'email' => $request->email,
                'foto_profil' => $request->foto_profil
            ]);
            if($siswa){
                Session::flash('status', 'sukses');
                Session::flash('message', 'update student sukses');
            }
        }
        else if((!$request->file('foto'))){
            $siswa = Siswa::findOrFail($id);
            

            $siswa->update([
                'nama' => $request['nama'],
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'email' => $request->email,
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
        return redirect('/tampilSiswa');
    }

    public function destroy($id)
    {
        $barang = Siswa::findOrFail($id);
        $barang->delete();

        if($barang){
            Session::flash('status', 'sukses');
            Session::flash('message', 'delete student sukses');
        }

        return redirect('/tampilSiswa');
    }

    public function deletePengajuan($id)
    {
        $detailPinjaman = DetailPeminjaman::where('id_peminjaman', $id)->get();
        foreach ($detailPinjaman as $detail) {
            $detail->delete();
        }
        $pinjaman = Peminjaman::where('id', $id)->get();
        foreach ($pinjaman as $detail) {
            $detail->delete();
        }
        
        $detail = Siswa::where('id', auth()->user()->id)->with('pinjaman.detailPinjaman.barangDetail')->get();
        return redirect('/user');
    }

    public function showProfile($id)
    {
        $profile = Siswa::findOrFail($id);
        return view("user.profilePage", ['profile' => $profile]);
    }
    
    public function editProfile($id, Request $request)
    {
        $profile = Siswa::findOrFail($id);
        if (Hash::check($request['password'],$profile['password'] )) {
            return view("user.updateProfile", ['profile' => $profile]);
            
        } else {
            //pasang session
            Session::flash('statusFailSiswa', 'failed');
            Session::flash('message', 'Password salah');
            //dd($request['password']);
            return view("user.profilePage", ['profile' => $profile]);
        }
    }
    public function updateProfile($id, Request $request)
    {
        // dd($request->file('foto'));
        $newName = '';
        if(($request->file('foto'))){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
            // $request->file('foto')->storeAs('image', $newName);
            $request->file('foto')->move('fotoSiswa', $newName);
            $request['foto_profil'] = $newName;
            $siswa = Siswa::findOrFail($id);
            

            $siswa->update([
                'nama' => $request['nama'],
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'email' => $request->email,
                'foto_profil' => $request->foto_profil
            ]);
            if($siswa){
                Session::flash('status', 'sukses');
                Session::flash('message', 'update student sukses');
            }
        }
        else if((!$request->file('foto'))){
            $siswa = Siswa::findOrFail($id);
            

            $siswa->update([
                'nama' => $request['nama'],
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'email' => $request->email,
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
        return view("user.profilePage", ['profile' => $siswa]);
    }
}
