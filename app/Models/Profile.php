<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile'; // Sesuai nama tabel di SQL Anda

    protected $fillable = [
        'nama_opd',
        'visi',
        'misi',
        'struktur_organisasi',
        'alamat',
        'email',
        'telp',
        'facebook',
        'instagram',
        'youtube'
    ];
}
