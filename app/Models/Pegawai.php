<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $primaryKey = 'nip'; // Menggunakan NIP sebagai kunci utama
    public $incrementing = false;  // Karena NIP bukan angka auto-increment
    protected $keyType = 'string';

    protected $fillable = ['nip', 'nama_lengkap', 'jabatan', 'foto', 'gender'];
}
