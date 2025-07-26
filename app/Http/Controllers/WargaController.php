<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WargaController extends Controller
{
    // ================================
    // BAGIAN ADMIN
    // ================================

    //  Admin: Menampilkan daftar semua warga
    public function adminIndex(Request $request)
    {
        $query = Warga::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }

        $warga = $query->latest()->get();
        return view('admin.warga.index', compact('warga'));
    }

    //  Admin: Menampilkan form edit warga
    public function adminEdit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.warga.edit', compact('warga'));
    }

    //  Admin: Update data warga
    public function adminUpdate(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nik'                  => 'required|digits:16|unique:warga,nik,' . $id,
            'nama_lengkap'         => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'jenis_kelamin'        => 'required|in:Laki-laki,Perempuan',
            'alamat'               => 'required|string|max:255',
            'rt_rw'                => 'required|string|max:10',
            'kel_desa'             => 'required|string|max:255',
            'kecamatan'            => 'required|string|max:255',
            'agama'                => 'required|string|max:50',
            'status_perkawinan'    => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan'            => 'required|string|max:100',
            'foto_ktp'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kk'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('_token');
        $folder = 'foto_warga/' . Str::slug($request->nama_lengkap) . '-' . $warga->id;

        if ($request->hasFile('foto_ktp')) {
            if ($warga->foto_ktp && Storage::disk('public')->exists($warga->foto_ktp)) {
                Storage::disk('public')->delete($warga->foto_ktp);
            }
            $data['foto_ktp'] = $request->file('foto_ktp')->store($folder, 'public');
        }

        if ($request->hasFile('foto_kk')) {
            if ($warga->foto_kk && Storage::disk('public')->exists($warga->foto_kk)) {
                Storage::disk('public')->delete($warga->foto_kk);
            }
            $data['foto_kk'] = $request->file('foto_kk')->store($folder, 'public');
        }

        $warga->update($data);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    //  Admin: Menampilkan form tambah warga
    public function adminCreate()
    {
        return view('admin.warga.create');
    }

    //  Admin: Menyimpan data warga baru
    public function adminStore(Request $request)
    {
        $request->validate([
            'nik'                  => 'required|digits:16|unique:warga,nik',
            'nama_lengkap'         => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'jenis_kelamin'        => 'required|in:Laki-laki,Perempuan',
            'alamat'               => 'required|string|max:255',
            'rt_rw'                => 'required|string|max:10',
            'kel_desa'             => 'required|string|max:255',
            'kecamatan'            => 'required|string|max:255',
            'agama'                => 'required|string|max:50',
            'status_perkawinan'    => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan'            => 'required|string|max:100',
            'foto_ktp'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kk'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('_token');
        $warga = Warga::create($data);

        $folder = 'foto_warga/' . Str::slug($warga->nama_lengkap) . '-' . $warga->id;

        if ($request->hasFile('foto_ktp')) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store($folder, 'public');
        }
        if ($request->hasFile('foto_kk')) {
            $data['foto_kk'] = $request->file('foto_kk')->store($folder, 'public');
        }

        $warga->update($data);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil disimpan.');
    }

    //  Admin: Menghapus data warga
    public function adminDestroy($id)
    {
        $warga = Warga::findOrFail($id);
        $folder = 'foto_warga/' . Str::slug($warga->nama_lengkap) . '-' . $warga->id;

        if (Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->deleteDirectory($folder);
        }

        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }

    // ================================
    // BAGIAN WARGA (USER)
    // ================================

    //  Warga: Formulir pendaftaran
    public function index()
{
    $warga = Warga::all();
    return view('warga.pendaftaran.index', compact('warga'));
}

public function create()
{
    return view('warga.pendaftaran.create');
}


    //  Warga: Menyimpan data pendaftaran
    public function store(Request $request)
    {
        $request->validate([
            'nik'                  => 'required|digits:16|unique:warga,nik',
            'nama_lengkap'         => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'jenis_kelamin'        => 'required|in:Laki-laki,Perempuan',
            'alamat'               => 'required|string|max:255',
            'rt_rw'                => 'required|string|max:10',
            'kel_desa'             => 'required|string|max:255',
            'kecamatan'            => 'required|string|max:255',
            'agama'                => 'required|string|max:50',
            'status_perkawinan'    => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan'            => 'required|string|max:100',
            'foto_ktp'             => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kk'              => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['foto_ktp', 'foto_kk']);
        $warga = Warga::create($data);

        $folder = 'foto_warga/' . Str::slug($warga->nama_lengkap) . '-' . $warga->id;

        if ($request->hasFile('foto_ktp')) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store($folder, 'public');
        }

        if ($request->hasFile('foto_kk')) {
            $data['foto_kk'] = $request->file('foto_kk')->store($folder, 'public');
        }

        $warga->update($data);

        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil dikirim.');
    }
}