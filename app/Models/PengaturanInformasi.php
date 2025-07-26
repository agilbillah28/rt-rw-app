<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanInformasi extends Model
{
    use HasFactory;

    protected $table = 'pengaturan_informasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}
