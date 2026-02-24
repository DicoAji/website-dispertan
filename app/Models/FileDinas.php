<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileDinas extends Model
{
    protected $table = 'file_dinas';
    protected $fillable = ['uraian', 'file'];
}
