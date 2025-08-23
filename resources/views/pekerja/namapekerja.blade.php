@extends('layouts.apps')

@section('title', 'Daftar Klien - Jasa Human')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Daftar Pekerja</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('dashboard') }}" 
       class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500 hover:bg-green-600 text-white mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <table class="table-auto w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Umur</th>
                <th class="px-4 py-2">Jenis Kelamin</th>
                <th class="px-4 py-2">Negara</th>
            </tr>
        </thead>
        <tbody>
            @foreach($namapekerja as $k)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $k->nama }}</td>
                    <td class="px-4 py-2">{{ $k->umur }}</td>
                    <td class="px-4 py-2">{{ $k->jenis_kelamin }}</td>
                    <td class="px-4 py-2">{{ $k->negara }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    console.log("Halaman daftar pekerja siap dipakai!");
</script>
@endsection
