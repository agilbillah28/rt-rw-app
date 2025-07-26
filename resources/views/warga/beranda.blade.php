@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="relative w-full h-screen">
        <img src="{{ $heroImage && $heroImage->gambar ? asset('storage/'.$heroImage->gambar) : '/images/default-hero.jpg' }}" 
            alt="Hero Image" 
            class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="relative z-20 flex flex-col justify-center items-center h-full text-center px-4">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">
                Selamat Datang di RT 06/RW 08
            </h1>
            
        </div>
    </section>

    <!-- Pengumuman Section -->
    <!-- Pengumuman Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Pengumuman</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pengumuman as $item)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                        {{ $item->judul }}
                    </h3>
                    <p class="text-gray-600 whitespace-pre-line">
                        {{ $item->deskripsi }}
                    </p>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    Belum ada pengumuman.
                </div>
            @endforelse
        </div>
    </div>
</section>



    <!-- Visi Misi Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Visi & Misi</h2>
            <div class="max-w-4xl mx-auto bg-gray-50 p-6 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4">Visi</h3>
                <p class="mb-6 text-gray-700">Menjadi RT yang peduli dan responsif terhadap kebutuhan masyarakat, dengan meningkatkan kualitas pelayanan dan partisipasi aktif warga dalam pembangunan dan kegiatan sosial.</p>
                <h3 class="text-2xl font-semibold mb-4">Misi</h3>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li>Meningkatkan kualitas pelayanan masyarakat melalui penyediaan informasi dan fasilitas yang memadai.</li>
                    <li>Mengoptimalkan gotong royong dan kebersihan lingkungan.</li>
                    <li>Mewujudkan lingkungan yang aman, tertib, dan nyaman.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
 <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Galeri Kegiatan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach([
                '/images/WhatsApp Image 2025-07-26 at 4.18.30 AM.jpeg',
                '/images/WhatsApp Image 2025-07-26 at 4.18.29 AM.jpeg',
                '/images/WhatsApp Image 2025-07-26 at 4.18.30 AM (1).jpeg',
                '/images/WhatsApp Image 2025-07-26 at 4.18.30 AM (2).jpeg'
            ] as $src)
                <div class="w-full aspect-[4/3] bg-gray-200 rounded-lg overflow-hidden shadow">
                    <img src="{{ $src }}" alt="Foto Kegiatan"
                         class="w-full h-full object-cover object-center transition duration-300 hover:scale-105">
                </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center space-y-2">
            <p class="text-sm">
                <span class="text-gray-300">Email:</span>
                <a href="mailto:rt06rw010@example.com" class="text-blue-400 hover:underline">
                    rt06rw010@gmail.com
                </a>
            </p>
            <p class="text-sm">
                <span class="text-gray-300">Telp:</span>
                <a href="tel:081234567890" class="text-blue-400 hover:underline">
                    0838-9415-8103
                </a>
            </p>
        </div>
    </footer>
@endsection
