<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Pekerja - {{$pekerja->name}}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* Custom CSS variables and styles based on your Blade file */
        :root {
            --primary: #035f0b; /* A vintage brown color */
            --primary-light: #035f0b;
            --accent: #035f0b;
            --text: #4A4A4A;
            --text-light: #7A7A7A;
            --background: #FDFBF5; /* A warm, off-white background */
        }
        
        body {
            background-color: var(--background);
            font-family: 'Inter', sans-serif;
        }
        
        /* Custom font class for headers */
        .playfair {
            font-family: 'Playfair Display', serif;
        }
        
        /* Custom card style */
        .vintage-card {
            background-color: #ffffff;
            border: 1px solid var(--accent);
        }

        .vintage-shadow {
            box-shadow: 0 10px 20px -5px rgba(139, 90, 43, 0.15);
        }

        /* Custom accent color for buttons and dividers */
        .cultural-accent {
            background-color: var(--primary);
        }
    </style>
</head>
<body class="text-[var(--text)] p-6 md:p-8">

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold playfair text-[var(--text)] mb-2">Profile Pekerja</h1>
        <p class="text-[var(--text-light)]">Informasi lengkap tentang pekerja</p>
        <div class="w-32 h-1 cultural-accent rounded-full mx-auto mt-4"></div>
    </div>

    <!-- Profile Card -->
    <div class="vintage-card p-8 rounded-xl vintage-shadow">
        <div class="text-center mb-8">
            <img src="{{$pekerja->foto_url}}" class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-[var(--accent)]" alt="Foto Budi Santoso">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Informasi Pribadi -->
            <div>
                <h2 class="text-2xl font-bold playfair text-[var(--text)] mb-4">Informasi Pribadi</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Nama Lengkap</label>
                        <p class="text-lg font-semibold text-[var(--text)]">{{$pekerja->name}}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Umur</label>
                        <p class="text-lg font-semibold text-[var(--text)]">{{$pekerja->umur}}</p>
                    </div>

                     <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Jenis Kelamin</label>
                        <p class="text-lg font-semibold text-[var(--text)]">
                            @if($pekerja->gender == 'Laki-laki')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm inline-flex items-center">
                                    <i class="bi bi-gender-male mr-2"></i> Laki-laki
                                </span>
                            @else
                                <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm inline-flex items-center">
                                    <i class="bi bi-gender-female mr-2"></i> Perempuan
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Informasi Lokasi -->
            <div>
                <h2 class="text-2xl font-bold playfair text-[var(--text)] mb-4">Informasi Lokasi</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Negara Asal</label>
                        <p class="text-lg font-semibold text-[var(--text)]">{{$pekerja->negara}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="mt-8 pt-6 border-t border-[var(--accent)]/30">
            <h2 class="text-2xl font-bold playfair text-[var(--text)] mb-4">Deskripsi</h2>
            <p class="text-[var(--text-light)] leading-relaxed">
                Budi Santoso adalah pekerja profesional yang berpengalaman dalam bidangnya. 
                Berasal dari Indonesia, memiliki etos kerja yang baik dan dedikasi tinggi 
                dalam menyelesaikan setiap tugas yang diberikan.
            </p>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{route('pesanan.form', $pekerja->id)}}" class="cultural-accent px-6 py-3 rounded-lg text-white font-semibold hover:opacity-90 transition-opacity flex items-center">
                <i class="bi bi-calendar-plus mr-2"></i> Pesan Sekarang
            </a>
            
            <a href="{{route('pekerja.index')}}" class="border border-[var(--primary)] text-[var(--primary)] px-6 py-3 rounded-lg font-semibold hover:bg-[var(--primary)] hover:text-white transition-colors flex items-center">
                <i class="bi bi-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>
</div>

</body>
</html>
