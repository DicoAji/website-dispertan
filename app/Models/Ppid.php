<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppid extends Model
{
    use HasFactory;

    // Definisikan nama tabel secara eksplisit
    protected $table = 'ppid';

    // Kolom yang diizinkan untuk diisi secara massal (mass assignment)
    protected $fillable = [
        'nama',
        'kategori',
        'file',
        'link'
    ];
}
