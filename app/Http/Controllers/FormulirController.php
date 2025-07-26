<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class FormulirController extends Controller
{
    // WARGA: Tampilkan daftar pengajuan milik warga atau nama manual
    // WARGA: Tampilkan daftar pengajuan milik warga atau nama manual
public function index(Request $request)
{
    if ($request->filled('nama_lengkap')) {
        // Jika ada nama manual di URL (?nama_lengkap=...), tampilkan pengajuan itu
        $pengajuan = Pengajuan::where('nama_lengkap', $request->nama_lengkap)
            ->latest()->get();
    } else {
        // Kalau tidak ada nama manual, tampilkan SEMUA data (atau bisa dikosongkan)
        $pengajuan = Pengajuan::latest()->get();
    }

    return view('warga.pengajuan.index', compact('pengajuan'));
}

    //  WARGA: Form untuk membuat pengajuan baru
    public function create()
    {
        return view('warga.pengajuan.create');
    }

    //  WARGA: Simpan pengajuan baru
    //  WARGA: Simpan pengajuan baru
public function store(Request $request)
{
    $request->validate([
        'nik'          => 'required|digits:16', // ✅ validasi NIK
        'nama_lengkap' => 'required|string|max:255',
        'jenis_surat'  => 'required|string|max:255',
        'keterangan'   => 'nullable|string',
    ]);

    Pengajuan::create([
        'nik'          => $request->nik,           // ✅ simpan NIK
        'nama_lengkap' => $request->nama_lengkap,  // simpan nama
        'jenis_surat'  => $request->jenis_surat,
        'keterangan'   => $request->keterangan,
        'status'       => 'Menunggu',
    ]);

    return redirect()->route('warga.pengajuan.index')
        ->with('success', 'Pengajuan berhasil dikirim!');
}

    //  ADMIN: Tampilkan semua pengajuan
    public function admin()
    {
        $pengajuan = Pengajuan::latest()->get();
        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    // ADMIN: Tampilkan form untuk balas pengajuan
    public function showBalas($nama_lengkap, $created_at)
    {
        $pengajuan = Pengajuan::where('nama_lengkap', $nama_lengkap)
            ->where('created_at', $created_at)
            ->firstOrFail();

        return view('admin.pengajuan.balas', compact('pengajuan'));
    }

    //  ADMIN: Simpan surat balasan
    // ADMIN: Simpan surat balasan
public function balas(Request $request, $nama_lengkap, $created_at)
{
    $request->validate([
        'surat' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    // Cari pengajuan
    $pengajuan = Pengajuan::where('nama_lengkap', $nama_lengkap)
        ->where('created_at', $created_at)
        ->firstOrFail();

    // Simpan file
    $fileName = time() . '_' . $request->file('surat')->getClientOriginalName();
    $request->file('surat')->storeAs('public/surat', $fileName);

    // Update TANPA pakai model instance (hindari error id)
    Pengajuan::where('nama_lengkap', $nama_lengkap)
        ->where('created_at', $created_at)
        ->update([
            'file_surat' => $fileName,
            'status'     => 'Selesai',
        ]);

    return redirect()->route('admin.pengajuan.index')
        ->with('success', 'Surat balasan berhasil diunggah.');
}

}
