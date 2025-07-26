@extends('layouts.app')

@section('content')
<div class="container mt-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Edit Profil</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-3">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
    <label for="role" class="block font-medium text-sm text-gray-700">Role</label>
    <input id="role" type="text" value="{{ Auth::user()->role }}" disabled
        class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" />
</div>


        <div class="mb-3">
            <label for="password" class="block font-medium">Password Baru (opsional)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
