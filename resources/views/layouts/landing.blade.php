<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Beranda')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-lg font-bold text-white" id="navbar-title">RT 06 / RW 010</div>
            <div class="flex space-x-4">
                <a href="{{ route('beranda') }}" class="text-white hover:text-blue-400 transition">Beranda</a>
                <a href="{{ route('warga.pengajuan.index') }}" class="text-white hover:text-blue-400 transition">Pengajuan Surat</a>
                <a href="{{ route('pendaftaran') }}" class="text-white hover:text-blue-400 transition">Daftar Warga</a>
                <a href="{{ route('warga.pengaduan.index') }}" class="text-white hover:text-blue-400 transition">Pengaduan</a>
                <a href="{{ route('kontak') }}" class="text-white hover:text-blue-400 transition">Kontak</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-red-400 transition">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-0">
        @yield('content')
    </main>

    <!-- Navbar Scroll Script -->
    <script>
        const navbar = document.getElementById('navbar');
        const navbarLinks = navbar.querySelectorAll('a');
        const navbarTitle = document.getElementById('navbar-title');

        let lastScrollTop = 0;
        window.addEventListener('scroll', function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 50) {
                // Add solid background and shadow
                navbar.classList.add('bg-white', 'shadow');
                navbar.classList.remove('bg-transparent');
                navbarTitle.classList.remove('text-white');
                navbarTitle.classList.add('text-blue-600');
                navbarLinks.forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-gray-700');
                });
            } else {
                // Make navbar transparent again
                navbar.classList.remove('bg-white', 'shadow');
                navbar.classList.add('bg-transparent');
                navbarTitle.classList.add('text-white');
                navbarTitle.classList.remove('text-blue-600');
                navbarLinks.forEach(link => {
                    link.classList.add('text-white');
                    link.classList.remove('text-gray-700');
                });
            }

            if (scrollTop > lastScrollTop) {
                // Scroll down → hide navbar
                navbar.style.transform = "translateY(-100%)";
            } else {
                // Scroll up → show navbar
                navbar.style.transform = "translateY(0)";
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
    </script>
</body>
</html>
