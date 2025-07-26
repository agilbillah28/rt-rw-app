<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('{{ asset('images/bg-bendera.jpg') }}');">
        
        {{-- Ornamen pita atas --}}
        <div class="absolute top-0 left-0 right-0">
            <img src="{{ asset('images/iuy3088a.png') }}" alt="Pita Merah Putih" class="w-full">
        </div>
        {{-- Ornamen pita bawah --}}
        <div class="absolute bottom-0 left-0 right-0">
            <img src="{{ asset('images/lib509ld.png') }}" alt="Pita Merah Putih" class="w-full">
        </div>

        <div class="w-full max-w-md bg-white/70 backdrop-blur-md rounded-2xl shadow-lg p-8 relative z-10">

            {{-- Logo Garuda --}}
            <div class="flex justify-center mb-3">
                <img src="{{ asset('images/garuda.webp') }}" alt="Garuda Pancasila" class="h-16 w-16">
            </div>

            {{-- Judul --}}
            <h1 class="text-3xl font-bold text-center text-red-700 mb-1 tracking-wide">Dirgahayu Republik Indonesia ke-80</h1>
            <p class="text-center text-gray-700 mb-6">Silakan daftar untuk membuat akun baru</p>

            {{-- Form Register --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                {{-- Nama --}}
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-800" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded focus:ring-red-500 focus:border-red-500" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-800" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded focus:ring-red-500 focus:border-red-500" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-800" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded focus:ring-red-500 focus:border-red-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-800" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded focus:ring-red-500 focus:border-red-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- Tombol Daftar --}}
                <button type="submit"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-gradient-to-r from-red-600 to-white text-red-900 font-semibold rounded-lg shadow hover:from-red-700 hover:to-red-100 focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                    Daftar
                </button>

                {{-- Link ke Login --}}
                <p class="text-center text-sm text-gray-700 mt-3">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-red-600 hover:underline font-medium">Masuk di sini</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
