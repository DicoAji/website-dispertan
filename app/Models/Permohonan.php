<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'no_telepon',
        'email',
        'pekerjaan',
        'kategori_permohonan',
        'rincian_informasi',
        'tujuan_penggunaan',
        'cara_memperoleh',
        'foto_ktp',
        'berkas_pendukung',
        'status',
    ];
}
