<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200">
            <div class="p-4 font-bold text-xl border-b border-gray-200">
                Admin RT 06 / RW 08
            </div>
            <nav class="p-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('dashboard') ? 'bg-gray-200' : '' }}"> Dashboard</a>
                <a href="{{ route('warga.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('admin.warga.*') ? 'bg-gray-200' : '' }}"> Data Warga</a>
                <a href="{{ route('admin.pengajuan.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('pengajuan.*') ? 'bg-gray-200' : '' }}"> Pengajuan Surat</a>
                <a href="{{ route('admin.pengaduan.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('pengaduan.*') ? 'bg-gray-200' : '' }}"> Pengaduan</a>
                <a href="{{ route('pengaturaninformasi.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('pengumuman.*') ? 'bg-gray-200' : '' }}"> Pengaturan Informasi</a>
                
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-red-100 text-red-600"> Keluar</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-6">@yield('title')</h1>
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
