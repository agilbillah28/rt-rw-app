<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaturanInformasi;

class PengaturanInformasiController extends Controller
{
    // 👤 User lihat halaman beranda
    public function beranda()
    {
        // Ambil semua pengumuman
        $pengumuman = PengaturanInformasi::latest()->get();

        // Ambil gambar dari data pertama untuk hero
        $heroImage = PengaturanInformasi::first();

        return view('warga.beranda', compact('pengumuman', 'heroImage'));
    }

    public function create()
    {
        return view('admin.pengaturaninformasi.create');
    }

    //  Admin lihat semua pengumuman
    public function index()
    {
        $pengumuman = PengaturanInformasi::latest()->get();
        return view('admin.pengaturaninformasi', compact('pengumuman'));
    }

    //  Admin tambah pengumuman baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar hanya jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        PengaturanInformasi::create($validated);

        return redirect()->route('pengaturaninformasi.index')->with('success', ' Pengumuman berhasil ditambahkan!');
    }

    // 🆕 Admin edit pengumuman
    public function edit($id)
    {
        $pengumuman = PengaturanInformasi::findOrFail($id);
        return view('admin.pengaturaninformasi.edit', compact('pengumuman'));
    }

    // 🆕 Admin update pengumuman
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pengumuman = PengaturanInformasi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pengumuman->gambar && \Storage::exists('public/' . $pengumuman->gambar)) {
                \Storage::delete('public/' . $pengumuman->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        $pengumuman->update($validated);

        return redirect()->route('pengaturaninformasi.index')->with('success', 'Pengumuman berhasil diupdate!');
    }

    //  Admin hapus pengumuman
    public function destroy($id)
    {
        $pengumuman = PengaturanInformasi::findOrFail($id);

        // Hapus file gambar jika ada
        if ($pengumuman->gambar && \Storage::exists('public/' . $pengumuman->gambar)) {
            \Storage::delete('public/' . $pengumuman->gambar);
        }

        $pengumuman->delete();

        return redirect()->route('pengaturaninformasi.index')->with('success', ' Pengumuman berhasil dihapus!');
    }
}
