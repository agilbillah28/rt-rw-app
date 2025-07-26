<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center relative" 
    style="background-image: url('{{ asset('images/ewq.jpg') }}');">
        
        {{-- Ornamen pita atas --}}
<div class="absolute top-0 left-0 right-0 z-0">
    <img src="{{ asset('images/iuy3088a.png') }}" alt="Pita Merah Putih" class="w-full">
</div>

{{-- Ornamen pita bawah --}}
<div class="absolute bottom-0 left-0 right-0 z-0">
    <img src="{{ asset('images/22.png') }}" alt="Pita Merah Putih" class="w-full">
</div>


        <div class="w-full max-w-md bg-white/70 backdrop-blur-md rounded-2xl shadow-lg p-8 relative z-10">

            {{-- Logo Garuda --}}
            <div class="flex justify-center mb-3">
                <img src="{{ asset('images/garuda.webp') }}" alt="Garuda Pancasila" class="h-16 w-16">
            </div>

            {{-- Judul --}}
            <h1 class="text-3xl font-bold text-center text-red-700 mb-1 tracking-wide">Dirgahayu Republik Indonesia ke-80</h1>
            <p class="text-center text-gray-700 mb-6">Silakan login untuk masuk aplikasi</p>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-800" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded focus:ring-red-500 focus:border-red-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-800" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded focus:ring-red-500 focus:border-red-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-700">
                        <input type="checkbox" name="remember" class="rounded text-red-600 border-gray-300">
                        <span class="ml-2">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-red-600 hover:underline">Lupa Password?</a>
                    @endif
                </div>
                
                {{-- Link ke Register --}}
            <p class="text-center text-sm text-gray-700 mt-4">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-red-600 hover:underline font-medium">Daftar di sini</a>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full inline-flex justify-center items-center px-4 py-2 bg-gradient-to-r from-red-600 to-white text-red-900 font-semibold rounded-lg shadow hover:from-red-700 hover:to-red-100 focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                    Log in
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
