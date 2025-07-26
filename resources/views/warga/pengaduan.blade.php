<!-- resources/views/warga/pengaduan.blade.php -->
@extends('layouts.user')

@section('title', ' Kirim Pengaduan')

@section('content')
<div class="bg-white shadow rounded-xl p-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4"> Kirim Pengaduan</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            ✅ {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('warga.pengaduan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Isi Pengaduan</label>
            <textarea name="isi_pengaduan" rows="4" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kirim</button>
    </form>
</div>
@endsection
