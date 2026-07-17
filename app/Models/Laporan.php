<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // Menghubungkan model dengan tabel 'laporan' secara spesifik
    protected $table = 'laporan';

    // Menentukan kolom mana saja yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'telp',
        'pengaduan',
    ];
}
