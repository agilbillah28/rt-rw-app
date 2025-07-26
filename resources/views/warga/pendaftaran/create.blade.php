@extends('layouts.user')

@section('title', 'Pendaftaran Warga')

@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-3xl mx-auto space-y-6">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Pendaftaran Warga</h2>

    {{-- Alert error --}}
    @if ($errors->any())
    <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg shadow-sm">
        <strong class="font-semibold">Terjadi kesalahan:</strong>
        <ul class="list-disc pl-5 mt-2 space-y-1 text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Alert success --}}
    @if (session('success'))
    <div class="bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        {{-- NIK --}}
        <div>
            <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
            <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Masukkan NIK" required>
        </div>

        {{-- Nama Lengkap --}}
        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Masukkan nama lengkap" required>
        </div>

        {{-- Tempat/Tanggal Lahir + Jenis Kelamin --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="tempat_tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat/Tgl
                    Lahir</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                    value="{{ old('tempat_tanggal_lahir') }}"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Contoh: Jakarta, 10-01-1990" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>
        </div>

        {{-- Alamat --}}
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
        </div>

        {{-- RT/RW --}}
        <div>
            <label for="rt_rw" class="block text-sm font-medium text-gray-700 mb-1">RT/RW</label>
            <input type="text" id="rt_rw" name="rt_rw" value="{{ old('rt_rw') }}"
                class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Contoh: 001/005" required>
        </div>

        {{-- Kelurahan/Desa + Kecamatan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="kel_desa" class="block text-sm font-medium text-gray-700 mb-1">Kelurahan/Desa</label>
                <input type="text" id="kel_desa" name="kel_desa" value="{{ old('kel_desa') }}"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>
            <div>
                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>
        </div>

        {{-- Agama + Status Perkawinan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="agama" class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                <select id="agama" name="agama"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
                    <option value="">-- Pilih Agama --</option>
                    @foreach (['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                    <option value="{{ $agama }}" {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status_perkawinan" class="block text-sm font-medium text-gray-700 mb-1">Status
                    Perkawinan</label>
                <select id="status_perkawinan" name="status_perkawinan"
                    class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
                    <option value="">-- Pilih Status --</option>
                    @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $status)
                    <option value="{{ $status }}" {{ old('status_perkawinan') == $status ? 'selected' : '' }}>
                        {{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Pekerjaan --}}
        <div>
            <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}"
                class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
        </div>

        {{-- Upload Foto KTP --}}
        <div>
            <label for="foto_ktp" class="block text-sm font-medium text-gray-700 mb-1">Upload Foto KTP</label>
            <p class="text-gray-500 opacity-50 text-sm italic">
    *Jika tidak memiliki KTP silakan mengupload foto Kartu Keluarga
</p>

            <input type="file" id="foto_ktp" name="foto_ktp" accept="image/*"
                class="block w-full text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 sm:text-sm"
                required>
        </div>

        {{-- Upload Foto KK --}}
        <div>
            <label for="foto_kk" class="block text-sm font-medium text-gray-700 mb-1">Upload Foto Kartu Keluarga</label>
            <input type="file" id="foto_kk" name="foto_kk" accept="image/*"
                class="block w-full text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 sm:text-sm"
                required>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow transition">
                Kirim
            </button>
        </div>
    </form>
</div>
@endsection
