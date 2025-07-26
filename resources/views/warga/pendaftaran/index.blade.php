@extends('layouts.user') 
@section('title', 'Data Warga')
@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-7xl mx-auto space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-xl md:text-2xl font-semibold text-gray-800">Data Warga</h2>
        <a href="{{ route('pendaftaran.create') }}" 
           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow">
            Tambah Warga
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border border-gray-200 rounded-lg text-sm"> {{-- ✅ Font kecil --}}
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">NIK</th>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Tempat/Tgl Lahir</th>
                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">RT/RW</th>
                    <th class="px-4 py-2 text-left">Kel/Desa</th>
                    <th class="px-4 py-2 text-left">Kecamatan</th>
                    <th class="px-4 py-2 text-left">Agama</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($warga as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $item->nik }}</td>
                        <td class="px-4 py-2">{{ $item->nama_lengkap }}</td>
                        <td class="px-4 py-2">{{ $item->tempat_tanggal_lahir }}</td>
                        <td class="px-4 py-2">{{ $item->jenis_kelamin }}</td>
                        <td class="px-4 py-2">{{ $item->alamat }}</td>
                        <td class="px-4 py-2">{{ $item->rt_rw }}</td>
                        <td class="px-4 py-2">{{ $item->kel_desa }}</td>
                        <td class="px-4 py-2">{{ $item->kecamatan }}</td>
                        <td class="px-4 py-2">{{ $item->agama }}</td>
                        <td class="px-4 py-2">{{ $item->status_perkawinan }}</td>
                        <td class="px-4 py-2">{{ $item->pekerjaan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center py-4 text-gray-500">Belum ada data warga.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
