<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|{{  }}
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.userLogin');
})->middleware('guest');

/** start routing admin */
Route::get('/toLoginAdmin', function () {
    return view('admin.loginAdmin');
});

Route::get('/tampilBarang', [BarangController::class, 'index'])->middleware('auth:admin');
Route::get('/addBarang', [BarangController::class, 'create'])->middleware('auth:admin');
Route::post('/addBarang', [BarangController::class, 'store'])->middleware('auth:admin');
Route::get('/updateBarang/{id}', [BarangController::class, 'edit'])->middleware('auth:admin');
Route::put('/updateBarang/{id}', [BarangController::class, 'update'])->middleware('auth:admin');
Route::delete('/deleteBarang/{id}', [BarangController::class, 'destroy'])->middleware('auth:admin');

Route::get('/tampilSiswa', [SiswaController::class, 'index'])->middleware('auth:admin');
Route::get('/addSiswa', [SiswaController::class, 'create'])->middleware('auth:admin');
Route::post('/addSiswa', [SiswaController::class, 'store'])->middleware('auth:admin');
Route::get('/updateSiswa/{id}', [SiswaController::class, 'edit'])->middleware('auth:admin');
Route::put('/updateSiswa/{id}', [SiswaController::class, 'update'])->middleware('auth:admin');
Route::delete('/deleteSiswa/{id}', [SiswaController::class, 'destroy'])->middleware('auth:admin');


Route::get('/loginAdmin', [AuthController::class, 'loginAdmin'])->name('login')->middleware('guest');
Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->middleware('auth:admin');
Route::post('/prosesLoginAdmin', [AuthController::class, 'prosesLoginAdmin'])->middleware('guest');

Route::get('/loginSiswa', [AuthController::class, 'loginSiswa'])->name('login')->middleware('guest');
Route::get('/logoutSiswa', [AuthController::class, 'logoutSiswa'])->middleware('auth:siswa');
Route::post('/prosesLoginSiswa', [AuthController::class, 'prosesLoginSiswa'])->middleware('guest');

Route::get('/tampilRiwayat', [PeminjamanController::class, 'index'])->middleware('auth:admin');

/** Proses peminjaman admin */
Route::get('/tampilHomePage', [PeminjamanController::class, 'showAntri'])->middleware('auth:admin');
Route::put('/acc/{id}', [PeminjamanController::class, 'updateAcc'])->middleware('auth:admin');
Route::put('/tolak/{id}', [PeminjamanController::class, 'updateTol'])->middleware('auth:admin');
Route::put('/selesai/{id}', [PeminjamanController::class, 'updateSel'])->middleware('auth:admin');
/** */

/** end routing admin */

/** start routing user */

Route::get('/user', [SiswaController::class, 'index1'])->middleware('auth:siswa');
Route::get('/user3', [SiswaController::class, 'riwayatSiswa'])->middleware('auth:siswa');


Route::get('/user2', [PeminjamanController::class, 'create'])->middleware('auth:siswa');
Route::post('/peminjaman/{id}', [PeminjamanController::class, 'store'])->middleware('auth:siswa');

Route::get('/barang-add', [BarangController::class, 'show'])->name('barang-add')->middleware('auth:siswa');
Route::get('/barangAdd/{id}/{id_pinjam}', [BarangController::class, 'try'])->middleware('auth:siswa');
Route::post('/kirim/{id}/{id_pinjam}', [BarangController::class, 'masukData'])->middleware('auth:siswa');

// Route delete detail barang
Route::delete('/deleteDetailBarang/{id}/{id_pinjam}', [DetailPeminjamanController::class, 'destroy'])->middleware('auth:siswa');
Route::delete('/deleteAjuan/{id}', [SiswaController::class, 'deletePengajuan'])->middleware('auth:siswa');
Route::get('/profile/{id}', [SiswaController::class, 'showProfile'])->middleware('auth:siswa');
Route::post('/editProfile/{id}', [SiswaController::class, 'editProfile'])->middleware('auth:siswa');
Route::put('/editProfile/{id}', [SiswaController::class, 'updateProfile'])->middleware('auth:siswa');




/** end routing user */
