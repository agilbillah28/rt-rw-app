<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    // 👇 Paksa nama tabel jadi 'warga'
    protected $table = 'warga';

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt_rw',
        'kel_desa',
        'kecamatan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
    ];
}
