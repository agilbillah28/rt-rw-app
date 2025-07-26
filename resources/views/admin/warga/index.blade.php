@extends('layouts.admin')

@section('title', 'Data Warga')

@section('content')
<div class="bg-white shadow rounded-xl p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-700">
            Daftar Data Warga
        </h2>
        <a href="{{ route('warga.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow">
            Tambah Warga
        </a>
    </div>

    {{--  Search Form --}}
    <form method="GET" action="{{ route('warga.index') }}" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama warga..."
            class="rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
        <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow text-sm">
            Cari
        </button>
    </form>

    {{--  Tampilkan pesan sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 text-sm p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{--  Tabel warga --}}
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-50 text-gray-600 uppercase tracking-wide text-xs">
                <tr>
                    <th class="border-b px-4 py-2">No</th>
                    <th class="border-b px-4 py-2">NIK</th>
                    <th class="border-b px-4 py-2">Nama Lengkap</th>
                    <th class="border-b px-4 py-2">Alamat</th>
                    <th class="border-b px-4 py-2">RT/RW</th>
                    <th class="border-b px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($warga as $item)
                    <tr>
                        <td class="border-b px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border-b px-4 py-2">{{ $item->nik }}</td>
                        <td class="border-b px-4 py-2">{{ $item->nama_lengkap }}</td>
                        <td class="border-b px-4 py-2">{{ $item->alamat }}</td>
                        <td class="border-b px-4 py-2">{{ $item->rt_rw }}</td>
                        <td class="border-b px-4 py-2">
                            <a href="{{ route('warga.edit', $item->id) }}" class="text-yellow-500 hover:underline"> Edit</a>
                            <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus warga ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">
                            Tidak ada data warga.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
