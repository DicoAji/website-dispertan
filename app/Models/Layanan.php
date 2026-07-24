<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Definisikan nama tabel secara eksplisit (opsional tapi disarankan agar aman)
    protected $table = 'layanan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'link',
        'file'
    ];
}
