<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skm extends Model
{
    protected $table = 'skms'; // Nama tabel
    protected $fillable = ['tahun', 'triwulan', 'file']; // Kolom yang bisa diisi
}
