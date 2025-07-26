@extends('layouts.admin')

@section('title', 'Pengaturan Informasi')

@section('content')
<div class="bg-white shadow rounded-xl p-6">

    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 text-sm p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah Pengumuman --}}
    <form action="{{ route('pengaturaninformasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 mb-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Upload Gambar (Untuk Hero Section)</label>
            <input type="file" name="gambar"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow">
                Tambah
            </button>
        </div>
    </form>

    {{-- Tabel Daftar Pengumuman --}}
    <div class="overflow-x-auto border rounded-lg">
        <table class="w-full text-sm text-left table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 border text-center w-12">No</th>
                    <th class="px-4 py-2 border w-1/4">Judul</th>
                    <th class="px-4 py-2 border w-1/2">Deskripsi</th>
                    <th class="px-4 py-2 border text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengumuman as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $item->judul }}</td>
                        <td class="px-4 py-2 border truncate max-w-xs" title="{{ $item->deskripsi }}">
                            {{ $item->deskripsi }}
                        </td>
                        <td class="px-4 py-2 border text-center">
                            {{-- Tombol Edit --}}
                            <button onclick="showEditForm({{ $item->id }}, '{{ $item->judul }}', '{{ $item->deskripsi }}')"
    class="px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600 transition">
    Edit
</button>



                            {{-- Tombol Hapus --}}
                            <form action="{{ route('pengaturaninformasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')" class="inline-block">
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
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">
                            Belum ada pengumuman.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Form Edit Pengumuman (Hidden by Default) --}}
    <div id="editForm" class="mt-8 hidden bg-gray-50 p-4 rounded-lg shadow border">
        <h3 class="text-lg font-semibold mb-3">Edit Pengumuman</h3>

        <form id="editFormElement" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" id="editJudul" name="judul" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="editDeskripsi" name="deskripsi" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Upload Gambar Baru (Opsional)</label>
                <input type="file" name="gambar"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="hideEditForm()"
                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Script untuk Show/Hide Form Edit --}}
<script>
    function showEditForm(id, judul, deskripsi) {
        const form = document.getElementById('editForm');
        const editFormElement = document.getElementById('editFormElement');

        form.classList.remove('hidden');

        // Set action form edit
        editFormElement.action = `/pengaturaninformasi/${id}`;

        // Isi data ke input
        document.getElementById('editJudul').value = judul;
        document.getElementById('editDeskripsi').value = deskripsi;

        // Scroll ke form edit
        form.scrollIntoView({ behavior: 'smooth' });
    }

    function hideEditForm() {
        document.getElementById('editForm').classList.add('hidden');
    }
</script>
@endsection
