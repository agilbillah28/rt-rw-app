@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-3xl mx-auto">
   

    {{-- Data Pengaduan --}}
    <div class="mb-6 space-y-2">
        <p><span class="font-semibold">Nama Warga:</span> {{ $pengaduan->user->name ?? '-' }}</p>
        <p><span class="font-semibold">Tanggal:</span> {{ $pengaduan->created_at->format('d M Y H:i') }}</p>
        <p><span class="font-semibold">Isi Pengaduan:</span></p>
        <div class="p-3 border rounded-lg bg-gray-50 text-gray-800">
            {{ $pengaduan->isi_pengaduan }}
        </div>
    </div>

    {{-- Form Balasan --}}
    @if (!$pengaduan->balasan)
    <form action="{{ route('admin.pengaduan.balas', $pengaduan->id) }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="balasan" class="block text-sm font-medium text-gray-700">Balasan</label>
            <textarea id="balasan" name="balasan" rows="4" required
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm"></textarea>
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.pengaduan.index') }}"
               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg">Kembali</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                Kirim Balasan
            </button>
        </div>
    </form>
    @else
    <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
        <p class="font-semibold text-green-700">Balasan:</p>
        <p class="mt-2 text-gray-800">{{ $pengaduan->balasan }}</p>
    </div>
    <div class="flex justify-end mt-4">
        <a href="{{ route('admin.pengaduan.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg">Kembali</a>
    </div>
    @endif
</div>
@endsection
