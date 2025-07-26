<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    //  ADMIN: Tampilkan semua pengaduan
    public function admin()
{
    $pengaduan = Pengaduan::with('user')->latest()->get();
    return view('admin.pengaduan.index', compact('pengaduan'));
}
    // ADMIN: Tampilkan detail pengaduan
    public function show($id)
{
    $pengaduan = Pengaduan::with('user')->findOrFail($id);
    return view('admin.pengaduan.show', compact('pengaduan'));
}

    //  ADMIN: Membalas pengaduan
    public function balas(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'balasan' => $request->balasan,
            'status'  => 'Dibalas',
        ]);

        return redirect()->route('admin.pengaduan.index')
                         ->with('success', ' Balasan berhasil dikirim.');
    }

    //  ADMIN: Menghapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return back()->with('success', 'Pengaduan berhasil dihapus.');
    }

    //  WARGA: Tampilkan daftar pengaduan warga
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->latest()->get();
        return view('warga.pengaduan.index', compact('pengaduan'));
    }

    //  WARGA: Tampilkan form kirim pengaduan
    public function create()
    {
        return view('warga.pengaduan.create');
    }

    //  WARGA: Simpan pengaduan baru (AUTO user_id)
    public function store(Request $request)
{
    $request->validate([
        'isi_pengaduan' => 'required|string',
    ]);

    Pengaduan::create([
        'user_id'       => Auth::id(),
        'nama_lengkap'  => Auth::user()->name,   // <-- Tambahkan ini agar tidak error
        'isi_pengaduan' => $request->isi_pengaduan,
        'status'        => 'Menunggu',
    ]);

    return redirect()->route('warga.pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');

    }
}
