<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderKegiatan extends Model
{
    use HasFactory;

    // Beri tahu Laravel nama tabel yang kita buat di SQL tadi
    protected $table = 'kalender_kegiatan';

    // Kolom yang diizinkan untuk diisi datanya
    protected $fillable = [
        'nama_kegiatan',
        'kategori',
        'tanggal',
        'waktu',
        'lokasi',
        'deskripsi'
    ];
    public $timestamps = false;
}
