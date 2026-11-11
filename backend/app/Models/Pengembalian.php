<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $guarded = ['id'];

    // Relasi ke Model Peminjaman
    // Ganti 'peminjaman_id' jika nama kolom di database kamu berbeda (misal: 'id_peminjaman')
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    // Relasi ke Model User (Petugas)
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}