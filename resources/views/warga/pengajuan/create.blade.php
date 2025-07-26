@extends('layouts.user')

@section('title', 'Ajukan Surat')

@section('content')
<div class="px-4 md:px-10 mx-auto w-full space-y-6">
    {{-- Header --}}
    <div class="flex justify-between items-center">
        <h1 class="text-xl md:text-2xl font-semibold text-gray-800"> Ajukan Surat</h1>
        
        <a href="{{ route('warga.pengajuan.index') }}"
           class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium transition">
            ← Kembali ke Daftar Pengajuan
        </a>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-xl shadow-md p-6">
        {{-- Error Alert --}}
        @if ($errors->any())
            <div class="mb-4">
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg shadow-sm">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('warga.pengajuan.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- NIK --}}
            <div>
            </p>
                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Masukkan NIK" required>
            </div>

            {{-- Nama Lengkap --}}
            <div>
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap</p>
                </label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" required
                       class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       placeholder="Masukkan nama lengkap Anda">
            </div>

            {{-- Jenis Surat --}}
            <div>
                <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-1">
                    Jenis Surat
                </label>
                <select name="jenis_surat" id="jenis_surat" required
                        class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="Surat Pengantar">Surat Pengantar</option>
                    <option value="Surat Domisili">Surat Domisili</option>
                    <option value="Surat Keterangan">Surat Keterangan</option>
                    <option value="Surat Izin">Surat Izin</option>
                    <option value="Surat Tugas">Surat Tugas</option>
                    <option value="Surat Undangan">Surat Undangan</option>
                </select>
            </div>

            {{-- Keterangan --}}
            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                    Keterangan Surat
                </label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="block w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          placeholder="Contoh: Jika SKU berikan nama usaha, jenis usaha dan alamat usaha"></textarea>
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Ajukan Surat
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
