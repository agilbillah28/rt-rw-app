@extends('layouts.admin')

@section('title', 'Tambah Warga')

@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-2xl mx-auto">
   

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- NIK --}}
        <div>
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                   required>
        </div>

        {{-- Nama Lengkap --}}
        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                   required>
        </div>

        {{-- Tempat/Tanggal Lahir + Jenis Kelamin --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="tempat_tanggal_lahir" class="block text-sm font-medium text-gray-700">Tempat/Tgl Lahir</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir') }}"
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                       placeholder="Contoh: Jakarta, 10-01-1990" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                        required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>

        {{-- Alamat + RT/RW --}}
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                      required>{{ old('alamat') }}</textarea>
        </div>
        <div>
            <label for="rt_rw" class="block text-sm font-medium text-gray-700">RT/RW</label>
            <input type="text" id="rt_rw" name="rt_rw" value="{{ old('rt_rw') }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                   placeholder="Contoh: 001/005" required>
        </div>

        {{-- Kelurahan/Desa + Kecamatan --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="kel_desa" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
                <input type="text" id="kel_desa" name="kel_desa" value="{{ old('kel_desa') }}"
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                       required>
            </div>
            <div>
                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}"
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                       required>
            </div>
        </div>

        {{-- Agama + Status Perkawinan --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select id="agama" name="agama"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                        required>
                    <option value="">-- Pilih Agama --</option>
                    @foreach (['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                        <option value="{{ $agama }}" {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status_perkawinan" class="block text-sm font-medium text-gray-700">Status Perkawinan</label>
                <select id="status_perkawinan" name="status_perkawinan"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                        required>
                    <option value="">-- Pilih Status --</option>
                    @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $status)
                        <option value="{{ $status }}" {{ old('status_perkawinan') == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Pekerjaan --}}
        <div>
            <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                   required>
        </div>

        {{-- Upload Foto KTP --}}
        <div>
            <label for="foto_ktp" class="block text-sm font-medium text-gray-700">Upload Foto KTP</label>
            <input type="file" name="foto_ktp" id="foto_ktp"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                   required>
        </div>

        {{-- Upload Foto KK --}}
        <div>
            <label for="foto_kk" class="block text-sm font-medium text-gray-700">Upload Foto KK</label>
            <input type="file" name="foto_kk" id="foto_kk"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"
                   required>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2 pt-4">
            <a href="{{ route('warga.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700">
                Batal
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
