@extends('layouts.user')

@section('title', 'Daftar Pengajuan Surat')

@section('content')
<div class="px-4 md:px-10 mx-auto w-full space-y-6">
    {{-- Header --}}
    <div class="flex justify-between items-center">
        <h1 class="text-xl md:text-2xl font-semibold text-gray-800">Daftar Pengajuan Surat</h1>
        <a href="{{ route('warga.pengajuan.create') }}"
           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-3 py-1.5 rounded shadow transition">
            Ajukan Surat
        </a>
    </div>

    {{-- Grid List --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($pengajuan as $item)
        <div
            class="bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 transition p-5 flex flex-col justify-between space-y-3">
            
            {{-- Jenis Surat & Status --}}
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">{{ $item->jenis_surat }}</h2>
                @if ($item->status === 'Selesai')
                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700 font-medium">Selesai</span>
                @else
                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700 font-medium">Proses</span>
                @endif
            </div>

            {{-- Nama Login & Nama Manual --}}
            <div class="text-gray-600 text-sm space-y-1">
                <p><span class="font-medium">Nama Akun:</span> {{ auth()->user()->name }}</p>
                <p><span class="font-medium">Nama Pengajuan:</span> {{ $item->nama_lengkap }}</p>
                <p><span class="font-medium">Keterangan:</span> {{ $item->keterangan ?? '-' }}</p>
            </div>

            {{-- Aksi --}}
            <div class="flex justify-between items-center pt-3 border-t">
                @if ($item->status === 'Selesai' && $item->file_surat)
                <a href="{{ asset('storage/surat/'.$item->file_surat) }}" target="_blank"
                   class="text-blue-600 hover:underline text-sm font-medium">Download</a>
                @else
                <span class="text-gray-400 text-xs italic">Belum tersedia</span>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10 text-gray-400">
            <p class="text-lg">Belum ada pengajuan surat.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
