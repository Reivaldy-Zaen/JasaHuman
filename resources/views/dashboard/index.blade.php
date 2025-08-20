<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Jasa Human</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2C5530;
            --primary-light: #4C7B5F;
            --secondary: #8E6C4B;
            --accent: #D6BD98;
            --neutral: #F8F5F0;
            --text: #2D2A24;
            --text-light: #6B6657;
        }
        
        .vintage-bg {
            background: linear-gradient(135deg, #F8F5F0 0%, #EAE6DE 100%);
        }
        .culture-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(78, 103, 79, 0.03) 2px, transparent 2px),
                radial-gradient(circle at 80% 50%, rgba(78, 103, 79, 0.03) 2px, transparent 2px);
            background-size: 30px 30px;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .vintage-shadow {
            box-shadow: 0 4px 20px rgba(44, 85, 48, 0.1);
        }
        .cultural-accent {
            background: linear-gradient(45deg, var(--primary-light), var(--primary));
        }
        .playfair { font-family: 'Playfair Display', serif; }
        .inter { font-family: 'Inter', sans-serif; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        @keyframes subtle-pulse {
            0%, 100% { box-shadow: 0 0 0 rgba(78, 103, 79, 0.1); }
            50% { box-shadow: 0 0 10px rgba(78, 103, 79, 0.2); }
        }
        
        .float-animation { animation: float 6s ease-in-out infinite; }
        .subtle-pulse { animation: subtle-pulse 4s ease-in-out infinite; }
        
        .vintage-card {
            background: white;
            border: 1px solid rgba(142, 108, 75, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .vintage-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            z-index: 1;
        }
        
        .cultural-icon {
            color: var(--primary);
        }
        
        .sidebar-nav a {
            color: var(--text);
            transition: all 0.3s ease;
        }
        
        .sidebar-nav a:hover {
            background: rgba(78, 103, 79, 0.1);
        }
    </style>
</head>
<body class="vintage-bg culture-pattern min-h-screen inter">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-72 glass-effect text-[var(--text)] p-6 vintage-shadow">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold playfair cultural-icon mb-2">🏛 Jasa Human</h2>
            <p class="text-sm text-[var(--text-light)]">Cultural Heritage Services</p>
            <div class="w-16 h-1 cultural-accent rounded-full mx-auto mt-3"></div>
        </div>
        
        <nav class="space-y-3 sidebar-nav">
            <a href="#" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
                <span class="mr-3 text-xl">📊</span>
                <span class="font-medium">Dashboard</span>
                <span class="ml-auto            <a href="{{route('pekerja.index')}}" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
         <a href="#" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
>
                <span class="mr-3 text-xl">👥</span>
                <span class="font-medium">Pekerja</span>
                <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-[var(--primary)]">→</span>
            </a>
            <a href="#" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
                <span class="mr-3 text-xl">🏢</span>
                <span class="font-medium">Klien</span>
                <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-[var(--primary)]">→</span>
            </a>
            <a href="#" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
                <span class="mr-3 text-xl">📋</span>
                <span class="font-medium">Penugasan</span>
                <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-[var(--primary)]">→</span>
            </a>
            <a href="#" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
                <span class="mr-3 text-xl">📈</span>
                <span class="font-medium">Laporan</span>
                <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-[var(--primary)]">→</span>
            </a>
        </nav>
        
        <div class="mt-10 p-4 rounded-xl glass-effect border border-[var(--primary-light)]/20">
            <div class="text-center">
                <div class="text-3xl mb-2 cultural-icon">🌟</div>
                <p class="text-sm font-medium text-[var(--primary)]">Premium Heritage</p>
                <p class="text-xs text-[var(--text-light)] mt-1">Melayani dengan tradisi & kualitas</p>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold playfair text-[var(--text)] mb-2">Dashboard Jasa Human</h1>
            <p class="text-[var(--text-light)] text-lg">Mengelola warisan budaya dengan teknologi modern</p>
            <div class="w-32 h-1 cultural-accent rounded-full mt-4"></div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300 subtle-pulse">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-3xl text-[var(--primary)]">👥</div>
                    <div class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">↑</span>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Total Pekerja</h3>
                <p class="text-4xl font-bold text-[var(--primary)] playfair">250</p>
                <p class="text-sm text-[var(--text-light)] mt-2">+12% dari bulan lalu</p>
            </div>
            
            <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-3xl text-[var(--primary)]">🏢</div>
                    <div class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">↑</span>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Total Klien</h3>
                <p class="text-4xl font-bold text-[var(--primary)] playfair">{{ $totalKlien }}</p>
                <p class="text-sm text-[var(--text-light)] mt-2">+8% dari bulan lalu</p>
            </div>

            
            <div class="vintage-card p-6 rounded-xl vintage-shadow hover:scale-[1.02] transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-3xl text-[var(--primary)]">⚡</div>
                    <div class="cultural-accent w-12 h-12 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">●</span>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-[var(--text)] mb-1">Penugasan Aktif</h3>
                <p class="text-4xl font-bold text-[var(--primary)] playfair">45</p>
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
                        <span class="mr-3 text-[var(--primary)]">📋</span>Daftar Pekerja Terbaru
                    </h2>
                    <button class="cultural-accent px-4 py-2 rounded-lg text-white font-medium hover:opacity-90 transition-opacity">
                        Lihat Semua
                    </button>
                </div>
                
                <div class="overflow-hidden rounded-lg border border-[var(--accent)]">
                    <table class="w-full">
                        <thead class="cultural-accent text-white">
                            <tr>
                                <th class="p-4 text-left font-semibold">Nama</th>
                                <th class="p-4 text-left font-semibold">Posisi</th>
                                <th class="p-4 text-left font-semibold">Lokasi</th>
                                <th class="p-4 text-left font-semibold">Status</th>
                                <th class="p-4 text-left font-semibold">Jam Kerja</th>
                                <th class="p-4 text-left font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[var(--neutral)]">
                            <tr class="border-b border-[var(--accent)]/30 hover:bg-[var(--accent)]/10 transition-colors">
                                <td class="p-4 font-medium text-[var(--text)]">🧑 Andi Saputra</td>
                                <td class="p-4 text-[var(--text-light)]">Security Heritage</td>
                                <td class="p-4 text-[var(--text-light)]">Jakarta</td>
                                <td class="p-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">✓ Aktif</span>
                                </td>
                                <td class="p-4 text-[var(--text-light)]">3 Jam tersisa</td>
                                <td class="p-4">
                                <button onclick="tambahJamKerja('Andi Saputra')" class="cultural-accent px-3 py-1 rounded-lg text-white hover:opacity-90">+ Jam</button>
                                </td>
                            </tr>
                            <tr class="border-b border-[var(--accent)]/30 hover:bg-[var(--accent)]/10 transition-colors">
                                <td class="p-4 font-medium text-[var(--text)]">👩 Siti Rahma</td>
                                <td class="p-4 text-[var(--text-light)]">Cultural Curator</td>
                                <td class="p-4 text-[var(--text-light)]">Bandung</td>
                                <td class="p-4">
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">⏳ Proses</span>
                                </td>
                                <td class="p-4 text-[var(--text-light)]">3 Jam tersisa</td>
                                <td class="p-4">
                                <button onclick="tambahJamKerja('Andi Saputra')" class="cultural-accent px-3 py-1 rounded-lg text-white hover:opacity-90">+ Jam</button>
                                </td>
                            </tr>
                            <tr class="border-b border-[var(--accent)]/30 hover:bg-[var(--accent)]/10 transition-colors">
                                <td class="p-4 font-medium text-[var(--text)]">🧑 Budi Santoso</td>
                                <td class="p-4 text-[var(--text-light)]">Heritage Driver</td>
                                <td class="p-4 text-[var(--text-light)]">Surabaya</td>
                                <td class="p-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">✓ Aktif</span>
                                </td>
                                <td class="p-4 text-[var(--text-light)]">3 Jam tersisa</td>
                                <td class="p-4">
                                <button onclick="tambahJamKerja('Andi Saputra')" class="cultural-accent px-3 py-1 rounded-lg text-white hover:opacity-90">+ Jam</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-[var(--accent)]/10 transition-colors">
                                <td class="p-4 font-medium text-[var(--text)]">👩 Maya Sari</td>
                                <td class="p-4 text-[var(--text-light)]">Traditional Guide</td>
                                <td class="p-4 text-[var(--text-light)]">Yogyakarta</td>
                                <td class="p-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">✓ Aktif</span>
                                </td>
                                <td class="p-4 text-[var(--text-light)]">3 Jam tersisa</td>
                                <td class="p-4">
                                <button onclick="tambahJamKerja('Andi Saputra')" class="cultural-accent px-3 py-1 rounded-lg text-white hover:opacity-90">+ Jam</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</div>
<div id="modalTambahJam" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h3 class="text-xl font-bold mb-4">Tambah Jam Kerja</h3>
        <p id="namaPekerja" class="mb-3 text-[var(--text-light)]"></p>
        <label class="block mb-2 font-medium">Jumlah Jam Tambahan</label>
        <input type="number" id="jumlahJam" min="1" class="border rounded-lg w-full p-2 mb-4" />
        <div class="flex justify-end gap-3">
            <button onclick="closeModal()" class="px-4 py-2 border rounded-lg">Batal</button>
            <button onclick="simpanTambahJam()" class="cultural-accent px-4 py-2 text-white rounded-lg">Simpan</button>
        </div>
    </div>
</div>
<script>
let pekerjaDipilih = null;

function tambahJamKerja(nama) {
    pekerjaDipilih = nama;
    document.getElementById('namaPekerja').innerText = "Pekerja: " + nama;
    document.getElementById('modalTambahJam').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modalTambahJam').classList.add('hidden');
}

function simpanTambahJam() {
    let jam = parseInt(document.getElementById('jumlahJam').value);
    if (isNaN(jam) || jam <= 0) {
        alert("Masukkan jumlah jam yang valid");
        return;
    }
    alert(`Berhasil menambahkan ${jam} jam untuk ${pekerjaDipilih}`);
    closeModal();
}
</script>

</body>
</html>