@extends('layouts.user')

@section('title', 'Daftar Pengaduan')

@section('content')
<div class="px-4 md:px-10 mx-auto w-full space-y-6">
    {{-- Header --}}
    <div class="flex justify-between items-center">
        <h1 class="text-xl md:text-2xl font-semibold text-gray-800">Daftar Pengaduan</h1>
        <a href="{{ route('warga.pengaduan.create') }}"
           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-3 py-1.5 rounded shadow transition">
            Tambah Pengaduan
        </a>
    </div>

    {{-- Grid List --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($pengaduan as $item)
        <div
            class="bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 transition p-5 flex flex-col justify-between space-y-3">
            
            {{-- Isi Pengaduan & Status --}}
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800 truncate">Pengaduan #{{ $loop->iteration }}</h2>
                @if ($item->balasan)
                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700 font-medium">Dibalas</span>
                @else
                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700 font-medium">Belum Dibalas</span>
                @endif
            </div>

            {{-- Isi & Balasan --}}
            <div class="text-gray-600 space-y-1">
                <p class="text-sm"><span class="font-medium">Isi:</span> {{ $item->isi_pengaduan }}</p>
                <p class="text-sm">
                    <span class="font-medium">Balasan:</span> 
                    @if($item->balasan)
                        {{ $item->balasan }}
                    @else
                        <span class="italic text-gray-400">Belum ada balasan</span>
                    @endif
                </p>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10 text-gray-400">
            <p class="text-lg">Belum ada pengaduan.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
