<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $primaryKey = 'nip'; // Menggunakan NIP sebagai kunci utama
    public $incrementing = false;  // Karena NIP bukan angka auto-increment
    protected $keyType = 'string';

    // Tambahkan 'tingkat' di dalam array fillable
    protected $fillable = ['nip', 'nama_lengkap', 'jabatan', 'tingkat', 'foto', 'gender'];
}
