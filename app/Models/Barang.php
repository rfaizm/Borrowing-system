<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPeminjaman;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'foto_barang', 'stok_barang', 'keterangan_barang'];
    
    public function barang()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_barang', 'id');
    }

    // public function peminjaman()
    // {
    //     return $this->belongsToMany(Peminjaman::class, 'detail_peminjaman', 'id_barang', 'id_peminjaman');
    // }
}
