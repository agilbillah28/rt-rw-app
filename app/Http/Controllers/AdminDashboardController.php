<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Pengaduan;

class AdminDashboardController extends Controller
{
    public function index()
{
    // Hitung total
    $totalWarga = \App\Models\Warga::count();
    $totalPengajuan = \App\Models\Pengajuan::count();
    $totalPengaduan = \App\Models\Pengaduan::count();

    // Data per bulan, isi 0 jika tidak ada
    $pengajuanPerBulan = array_fill(1, 12, 0);
    $pengaduanPerBulan = array_fill(1, 12, 0);

    // Isi data pengajuan
    $pengajuan = \App\Models\Pengajuan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->pluck('total', 'bulan')
        ->toArray();
    foreach ($pengajuan as $bulan => $total) {
        $pengajuanPerBulan[$bulan] = $total;
    }

    // Isi data pengaduan
    $pengaduan = \App\Models\Pengaduan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
        ->groupBy('bulan')
        ->pluck('total', 'bulan')
        ->toArray();
    foreach ($pengaduan as $bulan => $total) {
        $pengaduanPerBulan[$bulan] = $total;
    }

    return view('admin.dashboard', compact(
        'totalWarga',
        'totalPengajuan',
        'totalPengaduan',
        'pengajuanPerBulan',
        'pengaduanPerBulan'
    ));
}}