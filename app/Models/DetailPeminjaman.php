<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Siswa;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';
    public $timestamps = false;

    protected $fillable = ['jumlah', 'id_barang', 'id_peminjaman'];

    
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id');
    }


    
    public function barangDetail()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}


