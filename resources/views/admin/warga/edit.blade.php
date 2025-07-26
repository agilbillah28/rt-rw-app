@extends('layouts.admin')

@section('title', 'Edit Warga')

@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-3xl mx-auto">
        

    {{-- Form --}}
    <form action="{{ route('warga.update', $warga->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- NIK --}}
        <div>
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="nik" name="nik" value="{{ old('nik', $warga->nik) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Nama Lengkap --}}
        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Tempat/Tanggal Lahir --}}
        <div>
            <label for="tempat_tanggal_lahir" class="block text-sm font-medium text-gray-700">Tempat/Tgl Lahir</label>
            <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir', $warga->tempat_tanggal_lahir) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Jenis Kelamin --}}
        <div>
            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
                <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Alamat --}}
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>{{ old('alamat', $warga->alamat) }}</textarea>
        </div>

        {{-- RT/RW --}}
        <div>
            <label for="rt_rw" class="block text-sm font-medium text-gray-700">RT/RW</label>
            <input type="text" id="rt_rw" name="rt_rw" value="{{ old('rt_rw', $warga->rt_rw) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Kelurahan/Desa --}}
        <div>
            <label for="kel_desa" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
            <input type="text" id="kel_desa" name="kel_desa" value="{{ old('kel_desa', $warga->kel_desa) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Kecamatan --}}
        <div>
            <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
            <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $warga->kecamatan) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Agama --}}
        <div>
            <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
            <select id="agama" name="agama"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
                @foreach (['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                    <option value="{{ $agama }}" {{ old('agama', $warga->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Status Perkawinan --}}
        <div>
            <label for="status_perkawinan" class="block text-sm font-medium text-gray-700">Status Perkawinan</label>
            <select id="status_perkawinan" name="status_perkawinan"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
                @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $status)
                    <option value="{{ $status }}" {{ old('status_perkawinan', $warga->status_perkawinan) == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pekerjaan --}}
        <div>
            <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm" required>
        </div>

        {{-- Foto KTP --}}
        <div>
            <label for="foto_ktp" class="block text-sm font-medium text-gray-700">Foto KTP (Opsional)</label>
            <input type="file" name="foto_ktp" id="foto_ktp" accept=".jpg,.jpeg,.png"
                class="mt-1 block w-full border rounded-lg shadow-sm focus:ring focus:ring-blue-200 sm:text-sm">
            @if ($warga->foto_ktp)
                <p class="text-gray-500 text-sm mt-1">Foto KTP Saat Ini:</p>
                <img src="{{ asset('storage/'.$warga->foto_ktp) }}" alt="Foto KTP" class="w-48 rounded border mt-2">
            @endif
        </div>

        {{-- Foto KK --}}
        <div>
            <label for="foto_kk" class="block text-sm font-medium text-gray-700">Foto KK (Opsional)</label>
            <input type="file" name="foto_kk" id="foto_kk" accept=".jpg,.jpeg,.png"
                class="mt-1 block w-full border rounded-lg shadow-sm focus:ring focus:ring-blue-200 sm:text-sm">
            @if ($warga->foto_kk)
                <p class="text-gray-500 text-sm mt-1">Foto KK Saat Ini:</p>
                <img src="{{ asset('storage/'.$warga->foto_kk) }}" alt="Foto KK" class="w-48 rounded border mt-2">
            @endif
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('warga.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700">
                 Batal
            </a>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
