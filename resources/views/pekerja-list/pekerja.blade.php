@extends('layouts.dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold playfair text-[var(--text)] mb-2">Daftar Semua Pekerja</h1>
    <p class="text-[var(--text-light)]">Total {{ $pekerja->count() }} pekerja terdaftar</p>
    <div class="w-32 h-1 cultural-accent rounded-full mt-4"></div>
</div>

@if(session('success'))
    <div class="bg-green-500 text-white p-4 mb-6 rounded-lg">{{ session('success') }}</div>
@endif

<div class="vintage-card p-6 rounded-xl vintage-shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="cultural-accent text-white">
                <tr>
                    <th class="p-4 text-left font-semibold">Foto</th>
                    <th class="p-4 text-left font-semibold">Nama Pekerja</th>
                    <th class="p-4 text-left font-semibold">Jenis Kelamin</th>
                    <th class="p-4 text-left font-semibold">Umur</th>
                    <th class="p-4 text-left font-semibold">Negara</th>
                    <th class="p-4 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-[var(--neutral)]">
                @foreach($pekerja as $p)
                <tr class="border-b border-[var(--accent)]/30 hover:bg-[var(--accent)]/10 transition-colors">
                    <td class="p-4">
                        <img src="{{ $p->foto }}" class="w-12 h-12 rounded-full object-cover" alt="Foto {{ $p->nama }}">
                    </td>
                    <td class="p-4 font-medium text-[var(--text)]">{{ $p->nama }}</td>
                    <td class="p-4 text-[var(--text-light)]">
                        @if($p->jenis_kelamin == 'Laki-laki')
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                <i class="bi bi-gender-male"></i> Laki-laki
                            </span>
                        @else
                            <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm">
                                <i class="bi bi-gender-female"></i> Perempuan
                            </span>
                        @endif
                    </td>
                    <td class="p-4 text-[var(--text-light)]">{{ $p->umur }} tahun</td>
                    <td class="p-4 text-[var(--text-light)]">{{ $p->negara }}</td>
                    <td class="p-4">
                        <a href="{{ route('pesanan.form', $p->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            <i class="bi bi-calendar-plus"></i> Pesan
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('dashboard') }}" class="cultural-accent px-6 py-3 rounded-lg text-white font-medium hover:opacity-90 transition-opacity">
        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>
@endsection