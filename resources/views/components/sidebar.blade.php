@extends('layouts.admin')

@section('title', ' Pengajuan Surat')

@section('content')
<div class="bg-white shadow rounded p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold"> Data Pengajuan Surat</h2>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Nama Lengkap</th>
                    <th class="border p-2">Jenis Surat</th>
                    <th class="border p-2">Keterangan</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $item->nama_lengkap }}</td>
                        <td class="border p-2">{{ $item->jenis_surat }}</td>
                        <td class="border p-2">{{ $item->keterangan }}</td>
                        <td class="border p-2">
                            <span class="px-2 py-1 text-xs rounded 
                                {{ $item->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-700' : ($item->status == 'Diterima' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="border p-2 flex gap-2">
                            <a href="{{ route('admin.pengajuan.balas', $item->id) }}" 
                               class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs">✉️ Balas</a>
                            <form method="POST" action="{{ route('admin.pengajuan.destroy', $item->id) }}" onsubmit="return confirm('Hapus pengajuan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">Belum ada pengajuan surat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
