@extends('layouts.admin') 

@section('title', 'Pengajuan Surat')

@section('content')
<div class="bg-white shadow rounded-xl p-6">
    <h2 class="text-xl font-semibold text-gray-700"> Daftar Pengajuan Surat</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-50 text-gray-600 uppercase tracking-wide text-xs">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">NIK</th>
                    <th class="px-4 py-2 border">Nama Lengkap</th>
                    <th class="px-4 py-2 border">Jenis Surat</th>
                    <th class="px-4 py-2 border">Keterangan</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuan as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $item->nik ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $item->nama_lengkap }}</td>
                        <td class="px-4 py-2 border">{{ $item->jenis_surat }}</td>
                        <td class="px-4 py-2 border">{{ $item->keterangan }}</td>
                        <td class="px-4 py-2 border">
                            <span class="inline-block px-2 py-1 text-xs rounded-full
                                {{ $item->status == 'Menunggu' ? 'bg-yellow-200 text-yellow-800' :
                                    ($item->status == 'Selesai' ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('admin.pengajuan.balas', ['nama_lengkap' => $item->nama_lengkap, 'created_at' => $item->created_at]) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Balas
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center text-gray-500">
                            Belum ada pengajuan surat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
