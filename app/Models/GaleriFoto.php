<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara spesifik (opsional, tapi disarankan)
    protected $table = 'galeri_fotos';

    // Menentukan kolom mana saja yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'kegiatan',
        'file',
        'kategori',
        'deskripsi'
    ];
}
