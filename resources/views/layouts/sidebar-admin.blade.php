<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="flex bg-gray-50 min-h-screen">
  <aside class="w-64 bg-white border-r hidden md:block">
    <div class="p-6 text-xl font-semibold">Admin</div>
    <nav class="px-6 space-y-2">
      <a href="{{ route('admin.dashboard') }}"
         class="block p-3 rounded hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200' : '' }}">
        Dashboard
      </a>
      <a href="{{ route('admin.warga.index') }}" class="block p-3 rounded hover:bg-gray-100">Data Warga</a>
      <a href="{{ route('admin.pengajuan.index') }}" class="block p-3 rounded hover:bg-gray-100">Pengajuan Surat</a>
      <a href="{{ route('admin.pengaduan.index') }}" class="block p-3 rounded hover:bg-gray-100">Pengaduan</a>
      <a href="{{ route('admin.pengumuman.index') }}" class="block p-3 rounded hover:bg-gray-100">Pengumuman</a>
    </nav>
  </aside>
  <main class="flex-1 p-6">
    @yield('content')
  </main>
</body>
</html>
