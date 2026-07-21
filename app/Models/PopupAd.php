<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupAd extends Model
{
    use HasFactory;

    // Matikan timestamps karena kolom created_at dan updated_at tidak ada
    public $timestamps = false;

    protected $fillable = [
        'kegiatan',
        'gambar'
    ];
}
