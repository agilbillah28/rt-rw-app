@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6"> Dashboard Admin</h1>

    {{-- Statistik Kartu --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500">Total Warga</p>
            <p class="text-4xl font-bold text-blue-600">{{ $totalWarga }}</p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500">Total Pengajuan</p>
            <p class="text-4xl font-bold text-green-600">{{ $totalPengajuan }}</p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500">Total Pengaduan</p>
            <p class="text-4xl font-bold text-red-600">{{ $totalPengaduan }}</p>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-5 rounded-2xl shadow">
            <h2 class="font-semibold mb-3">📈 Grafik Pengajuan</h2>
            <canvas id="grafikPengajuan" height="200"></canvas>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow">
            <h2 class="font-semibold mb-3">📊 Grafik Pengaduan</h2>
            <canvas id="grafikPengaduan" height="200"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        const pengajuanData = {!! json_encode(array_values($pengajuanPerBulan)) !!};
        const pengaduanData = {!! json_encode(array_values($pengaduanPerBulan)) !!};



        const ctxPengajuan = document.getElementById('grafikPengajuan').getContext('2d');
        new Chart(ctxPengajuan, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: pengajuanData,
                    borderColor: '#3b82f6',
                    backgroundColor: '#93c5fd',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        const ctxPengaduan = document.getElementById('grafikPengaduan').getContext('2d');
        new Chart(ctxPengaduan, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: pengaduanData,
                    backgroundColor: '#f87171'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
@endsection
