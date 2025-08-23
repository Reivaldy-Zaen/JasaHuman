@extends('layouts.apps')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300 subtle-pulse">
            <div class="flex items-center justify-between mb-4">
                <div class="text-3xl text-[var(--primary)]">👥</div>
                <a href="{{ route('pekerja.namapekerja') }}" class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">↑</span>
                </a>
            </div>
            <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Total Pekerja</h3>
            <p class="text-4xl font-bold text-[var(--primary)] playfair">{{ $totalPekerja }}</p>
            <p class="text-sm text-[var(--text-light)] mt-2">Semua Total Pekerja</p>
        </div>
        
        <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="text-3xl text-[var(--primary)]">🏢</div>
                <a href="{{ route('klien.index') }}" class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">↑</span>
                </a>
            </div>
            <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Total Klien</h3>
            <p class="text-4xl font-bold text-[var(--primary)] playfair">{{ $totalKlien }}</p>
            <p class="text-sm text-[var(--text-light)] mt-2">Semua Total Klien</p>
        </div>


        <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="text-3xl text-[var(--primary)]">⚡</div>
                <div class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">●</span>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Penugasan Aktif</h3>
            <p class="text-4xl font-bold text-[var(--primary)] playfair">{{ $penugasanAktif }}</p>
            <p class="text-sm text-[var(--text-light)] mt-2">Sedang berjalan</p>
        </div>
        
        <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="text-3xl text-[var(--primary)]">💰</div>
                <div class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">₹</span>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Gaji Bulanan</h3>
            <p class="text-4xl font-bold text-[var(--primary)] playfair">120M</p>
            <p class="text-sm text-[var(--text-light)] mt-2">Rupiah per bulan</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Tabel Data -->
        <div class="lg:col-span-2 vintage-card p-6 rounded-xl vintage-shadow">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-[var(--text)] playfair flex items-center">
                    <span class="mr-3 text-[var(--primary)]">📋</span>Daftar Pesanan
                </h2>
                <a href="{{ route('pesanan.index') }}" 
                class="cultural-accent px-4 py-2 rounded-lg text-white font-medium hover:opacity-90 transition-opacity">
                    Lihat Semua
                </a>

            </div>
            <div class="overflow-hidden rounded-lg border border-[var(--accent)]">
                <table class="w-full">
                    <thead class="cultural-accent text-white">
                        <tr>
                            <th class="p-4 text-left font-semibold">Nama Pembeli</th>
                            <th class="p-4 text-left font-semibold">Pekerja</th>
                            <th class="p-4 text-left font-semibold">Lokasi</th>
                            <th class="p-4 text-left font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[var(--neutral)]">
                        @foreach($daftarPekerjaTerbaru as $pesanan)
                        <tr class="border-b border-[var(--accent)]/30 hover:bg-[var(--accent)]/10 transition-colors">
                            <td class="p-4 font-medium text-[var(--text)]">
                                {{ $pesanan->klien->nama }}
                            </td>
                            <td class="p-4 text-[var(--text-light)]">
                                {{ $pesanan->pekerja->nama ?? 'N/A' }}
                            </td>
                            <td class="p-4 text-[var(--text-light)]">
                                {{ $pesanan->pekerja->negara ?? 'N/A' }}
                            </td>
                            <td class="p-4">
                                @if($pesanan->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                        ⏳ Pending
                                    </span>
                                @elseif($pesanan->status == 'progres')
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                        🚀 Progres
                                    </span>
                                @elseif($pesanan->status == 'selesai')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                        ✓ Selesai
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">
                                        ❓ {{ $pesanan->status }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Pekerja Terlaris -->
        <div class="lg:col-span-2 vintage-card p-6 rounded-xl vintage-shadow mt-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-[var(--text)] playfair flex items-center">
                    <span class="mr-3 text-[var(--primary)]">👑</span>Pekerja Terlaris
                </h2>
                <button class="cultural-accent px-4 py-2 rounded-lg text-white font-medium hover:opacity-90 transition-opacity">
                    Lihat Semua
                </button>
            </div>
            <div class="overflow-hidden rounded-lg border border-[var(--accent)]">
                <table class="w-full">
                    <thead class="cultural-accent text-white">
                        <tr>
                            <th class="p-4 text-left font-semibold">Nama Pekerja</th>
                            <th class="p-4 text-left font-semibold">Negara</th>
                            <th class="p-4 text-left font-semibold">Total Pesanan</th>
                            <th class="p-4 text-left font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[var(--neutral)]">
                        @foreach($pekerjaTerlaris as $pekerja)
                        <tr class="border-b border-[var(--accent)]/30 hover:bg-[var(--accent)]/10 transition-colors">
                            <td class="p-4 font-medium text-[var(--text)]">{{ $pekerja->nama }}</td>
                            <td class="p-4 text-[var(--text-light)]">{{ $pekerja->negara ?? 'N/A' }}</td>
                            <td class="p-4 text-[var(--text-light)]">{{ $pekerja->pesanan_count }}</td>
                            <td class="p-4">
                                @if($loop->first)
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                        ⭐ Terlaris
                                    </span>
                                @else
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                        ✓ Aktif
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="vintage-card p-6 rounded-xl vintage-shadow">
            <h2 class="text-xl font-bold text-[var(--text)] playfair mb-4 flex items-center">
                <span class="mr-3 text-[var(--primary)]">📈</span>Tren Klien
            </h2>
            <div class="h-48">
                <canvas id="buyerChart" class="w-full h-full"></canvas>
            </div>
            
            <!-- Additional Info -->
            <div class="mt-6 space-y-3">
                <div class="flex items-center justify-between p-3 bg-[var(--neutral)] rounded-lg">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-[var(--text)]">Klien Naik</span>
                    </div>
                    <span class="text-lg font-bold text-green-600">+15%</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-[var(--neutral)] rounded-lg">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                        <span class="text-sm font-medium text-[var(--text)]">Klien Turun</span>
                    </div>
                    <span class="text-lg font-bold text-red-600">-5%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cultural Footer -->
    <div class="mt-8 text-center">
        <div class="flex items-center justify-center space-x-4 text-[var(--text-light)]">
            <span class="text-[var(--primary)]">🏛</span>
            <span class="text-sm">Melestarikan budaya dengan teknologi modern</span>
            <span class="text-[var(--primary)]">⚡</span>
        </div>
    </div>
@endsection

@section('scripts')
<script>
const ctx = document.getElementById('buyerChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [
            {
                label: 'Klien Naik',
                data: [50, 70, 90, 120, 150, 180],
                borderColor: '#16A34A',
                backgroundColor: 'rgba(22, 163, 74, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#16A34A',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 5
            },
            {
                label: 'Klien Turun',
                data: [40, 35, 50, 70, 85, 75],
                borderColor: '#DC2626',
                backgroundColor: 'rgba(220, 38, 38, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#DC2626',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 5
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(44, 85, 48, 0.1)'
                },
                ticks: {
                    color: '#2C5530',
                    font: {
                        size: 11
                    }
                }
            },
            x: {
                grid: {
                    color: 'rgba(44, 85, 48, 0.1)'
                },
                ticks: {
                    color: '#2C5530',
                    font: {
                        size: 11
                    }
                }
            }
        },
        elements: {
            line: {
                borderWidth: 3
            }
        }
    }
});
</script>
@endsection