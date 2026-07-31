<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLayanan extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit karena nama tabel kita menggunakan underscore
    protected $table = 'menu_layanan';

    // Menentukan kolom mana saja yang diizinkan untuk diisi secara massal (mass-assignment)
    protected $fillable = [
        'nama',
        'file',
        'link'
    ];
}
