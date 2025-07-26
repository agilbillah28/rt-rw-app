@extends('layouts.admin')

@section('title', 'Balas Pengajuan Surat')

@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-3xl mx-auto">
    {{-- Detail Pengajuan --}}
    <div class="mb-6 space-y-3">
        <div class="flex justify-between text-gray-700">
            <span class="font-medium"> Nama Lengkap:</span>
            <span>{{ $pengajuan->nama_lengkap }}</span>
        </div>
        <div class="flex justify-between text-gray-700">
            <span class="font-medium"> Jenis Surat:</span>
            <span>{{ $pengajuan->jenis_surat }}</span>
        </div>
        <div class="flex justify-between text-gray-700">
            <span class="font-medium"> Keterangan:</span>
            <span>{{ $pengajuan->keterangan }}</span>
        </div>
        <div class="flex justify-between text-gray-700">
            <span class="font-medium"> Dibuat pada:</span>
            <span>{{ $pengajuan->created_at->format('d M Y H:i') }}</span>
        </div>
        <div class="flex justify-between text-gray-700">
            <span class="font-medium"> Status:</span>
            <span class="inline-block px-2 py-1 text-xs rounded-full
                {{ $pengajuan->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-800' :
                    ($pengajuan->status == 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700') }}">
                {{ $pengajuan->status }}
            </span>
        </div>
    </div>

    {{-- Form Upload Balasan --}}
    <form action="{{ route('admin.pengajuan.balas.store', ['nama_lengkap' => $pengajuan->nama_lengkap, 'created_at' => $pengajuan->created_at]) }}"
          method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div>
            <label for="surat" class="block text-sm font-medium text-gray-700">📎 Upload Surat Balasan (PDF/DOC/DOCX)</label>
            <input type="file" name="surat" id="surat" accept=".pdf,.doc,.docx" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
            @error('surat')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.pengajuan.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md">
                 Kembali
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md shadow">
                 Kirim Surat
            </button>
        </div>
    </form>
</div>
@endsection
