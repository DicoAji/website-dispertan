<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Sangat penting: Mendefinisikan nama tabel secara manual
    // Karena secara default Laravel akan mencari tabel bernama 'menus' (pakai 's')
    protected $table = 'menu';

    // Menentukan kolom mana saja yang boleh diisi datanya (Mass Assignment)
    protected $fillable = [
        'menu',
        'link',
        'file',
    ];
}
