<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita'; // Nama tabel SQL yang baru dibuat
    protected $fillable = ['judul', 'tanggal_berita', 'foto_berita', 'deskripsi'];
}

