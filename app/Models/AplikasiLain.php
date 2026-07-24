<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplikasiLain extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti standar plural Laravel
    protected $table = 'aplikasi_lain';

    // Kolom yang diizinkan untuk diisi secara massal (mass assignment)
    protected $fillable = [
        'nama_aplikasi',
        'icon',
        'link'
    ];
}
