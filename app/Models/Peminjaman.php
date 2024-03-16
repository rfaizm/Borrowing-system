<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\DetailPeminjaman;
use App\Models\Admin;


class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'tgl_pinjaman',
        'waktu_pinjam',
        'waktu_kembali',
        'keperluan',
        'no_telp',
        'status_pinjaman',
        'id_siswa'
    ];

    public function siswa(){

        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');

    }   
    
    public function detailPinjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_peminjaman', 'id');
        
    }

    // /**
    //  * The barang that belong to the Peminjaman
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function barang()
    // {
    //     return $this->belongsToMany(Barang::class, 'detail_peminjaman', 'id_peminjaman', 'id_barang');
    // }
}
