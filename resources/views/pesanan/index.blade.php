@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Daftar Pesanan</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mb-4">{{ session('success') }}</div>
    @endif

    <table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanan as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ ucfirst($p->status) }}</td>
            <td>
                @if($p->status == 'aktif')
                    <form action="{{ route('pesanan.selesai', $p->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Selesaikan</button>
                    </form>
                @else
                    <span>Selesai</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
