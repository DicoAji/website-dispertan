<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileDinas extends Model
{
    protected $table = 'file_dinas';

    // Tambahkan 'tahun' dan 'kategori' ke dalam array fillable
    protected $fillable = ['uraian', 'file', 'tahun', 'kategori'];
}
