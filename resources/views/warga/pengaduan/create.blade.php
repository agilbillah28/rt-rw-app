@extends('layouts.user')

@section('title', 'Kirim Pengaduan')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4"> Kirim Pengaduan</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
             {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('warga.pengaduan.store') }}">
        @csrf

        <div class="mb-4">
            <label for="isi_pengaduan" class="block text-sm font-medium text-gray-700">Isi Pengaduan</label>
            <textarea id="isi_pengaduan" name="isi_pengaduan" rows="4" class="mt-1 block w-full border rounded p-2 focus:outline-none focus:ring focus:border-blue-300" required></textarea>
            @error('isi_pengaduan')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
             Kirim Pengaduan
        </button>
    </form>
</div>
@endsection
