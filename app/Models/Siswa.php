<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use App\Models\Peminjaman;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = ['nis', 'nama', 'password', 'kelas', 'email', 'foto_profil'];
    
    public function pinjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_siswa', 'id');
    }
}
