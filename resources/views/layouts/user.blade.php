<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-white shadow-md h-screen fixed">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-600">Warga</h1>
            </div>
            <nav class="px-4">
                <a href="{{ route('beranda') }}" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded">
                Beranda
                </a>
                <a href="{{ route('warga.pengajuan.index') }}" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded">
                Pengajuan Surat
                </a>

                <a href="{{ route('pendaftaran') }}" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded">
                Daftar Warga
                </a>
                <a href="{{ route('warga.pengaduan.index') }}" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded">
                Pengaduan
                </a>
                
                <a href="{{ route('kontak') }}" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded">
                Kontak
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full text-left py-2 px-4 text-red-600 hover:bg-gray-200 rounded">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
