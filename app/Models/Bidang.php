<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidang';

    protected $fillable = [
        'uraian',
        'deskripsi',
        'kategori',
        'file',
        'gambar',
    ];

    // Tambahkan baris ini agar Laravel tidak mencari kolom updated_at
    public const UPDATED_AT = null;
}
