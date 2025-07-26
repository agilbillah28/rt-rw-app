@extends('layouts.admin')

@section('title', 'Pengaduan Warga')

@section('content')
<div class="bg-white shadow rounded-xl p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Daftar Pengaduan Warga</h2>
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-50 text-gray-600 uppercase tracking-wide text-xs">
                <tr>
                    <th class="border px-3 py-2 text-center">No</th>
                    <th class="border px-3 py-2">Nama Warga</th>
                    <th class="border px-3 py-2">Tanggal</th>
                    <th class="border px-3 py-2">Isi Pengaduan</th>
                    <th class="border px-3 py-2 text-center">Status</th>
                    <th class="border px-3 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-3 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-3 py-2">{{ $item->user->name ?? '-' }}</td>
                        <td class="border px-3 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                        <td class="border px-3 py-2">
                            <span class="line-clamp-2">{{ Str::limit($item->isi_pengaduan, 50, '...') }}</span>
                        </td>
                        <td class="border px-3 py-2 text-center">
                            @if ($item->balasan)
                                <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                    Dibalas
                                </span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                                    Menunggu
                                </span>
                            @endif
                        </td>
                        <td class="border px-3 py-2 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.pengaduan.show', $item->id) }}"
                               class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition">
                                 Lihat
                            </a>
                            <form action="{{ route('admin.pengaduan.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus pengaduan ini?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 transition">
                                     Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-3 py-4 text-gray-500">
                            Tidak ada pengaduan yang masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
