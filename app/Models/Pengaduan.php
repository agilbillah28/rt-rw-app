<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
    'user_id',
    'nama_lengkap',  // <== tambahkan ini
    'isi_pengaduan',
    'balasan',
    'status',
];


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
