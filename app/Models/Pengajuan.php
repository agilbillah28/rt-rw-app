<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    // 👉 Pakai primary key custom
    protected $primaryKey = 'nama_lengkap';
    public $incrementing = false; // karena bukan auto increment
    protected $keyType = 'string'; // karena nama_lengkap itu string

    protected $fillable = [
        'nik', 
        'user_id',
        'nama_lengkap',
        'jenis_surat',
        'keterangan',
        'file_surat',
        'status',
    ];
}
