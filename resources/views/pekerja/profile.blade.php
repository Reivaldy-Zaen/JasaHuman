@extends('layouts.apps')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <a href="{{ route('pekerja.index') }}" class="inline-flex items-center text-[var(--primary)] hover:text-[var(--primary-light)] mb-4">
            <i class="bi bi-arrow-left mr-2"></i> Kembali ke Daftar Pekerja
        </a>
        <h1 class="text-4xl font-bold playfair text-[var(--text)] mb-2">Profile Pekerja</h1>
        <p class="text-[var(--text-light)]">Informasi lengkap tentang pekerja</p>
        <div class="w-32 h-1 cultural-accent rounded-full mx-auto mt-4"></div>
    </div>

    <!-- Profile Card -->
    <div class="vintage-card p-8 rounded-xl vintage-shadow">
        <div class="text-center mb-8">
            <img src="{{ $pekerja->foto }}" class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-[var(--accent)]" alt="Foto {{ $pekerja->nama }}">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Pribadi -->
            <div>
                <h2 class="text-2xl font-bold playfair text-[var(--text)] mb-4">Informasi Pribadi</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Nama Lengkap</label>
                        <p class="text-lg font-semibold text-[var(--text)]">{{ $pekerja->nama }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Umur</label>
                        <p class="text-lg font-semibold text-[var(--text)]">{{ $pekerja->umur }} tahun</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Jenis Kelamin</label>
                        <p class="text-lg font-semibold text-[var(--text)]">
                            @if($pekerja->jenis_kelamin == 'Laki-laki')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                    <i class="bi bi-gender-male"></i> Laki-laki
                                </span>
                            @else
                                <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm">
                                    <i class="bi bi-gender-female"></i> Perempuan
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
                        <p class="text-lg font-semibold text-[var(--text)]">{{ $pekerja->negara }}</p>
                    </div>

                    {{-- <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Status</label>
                        <p class="text-lg font-semibold text-green-600">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                <i class="bi bi-check-circle"></i> Tersedia
                            </span>
                        </p>
                    </div> --}}

                    {{-- <div>
                        <label class="block text-sm font-medium text-[var(--text-light)] mb-1">Rating</label>
                        <div class="flex items-center">
                            <div class="text-yellow-400 text-xl">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <span class="ml-2 text-lg font-semibold text-[var(--text)]">4.5/5</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="mt-8 pt-6 border-t border-[var(--accent)]/30">
            <h2 class="text-2xl font-bold playfair text-[var(--text)] mb-4">Deskripsi</h2>
            <p class="text-[var(--text-light)] leading-relaxed">
                {{ $pekerja->nama }} adalah pekerja profesional yang berpengalaman dalam bidangnya. 
                Berasal dari {{ $pekerja->negara }}, memiliki etos kerja yang baik dan dedikasi tinggi 
                dalam menyelesaikan setiap tugas yang diberikan.
            </p>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex gap-4">
            <a href="{{ route('pesanan.form', $pekerja->id) }}" class="cultural-accent px-6 py-3 rounded-lg text-white font-medium hover:opacity-90 transition-opacity flex items-center">
                <i class="bi bi-calendar-plus mr-2"></i> Pesan Sekarang
            </a>
            
            <a href="{{ route('pekerja.index') }}" class="border border-[var(--primary)] text-[var(--primary)] px-6 py-3 rounded-lg font-medium hover:bg-[var(--primary)] hover:text-white transition-colors">
                <i class="bi bi-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection