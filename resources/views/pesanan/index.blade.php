@extends('layouts.apps')

@section('title', 'Daftar Pesanan - Jasa Human')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Daftar Pesanan</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Email</th>
                <th>Nama Pekerja</th>
                <th>No. Telp</th>
                <th>Jam Mulai</th>
                <th>Durasi (Jam)</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_pemesan }}</td>
                    <td>{{ $p->email_pemesan }}</td>
                    <td>{{ $p->nama_pekerja }}</td>
                    <td>{{ $p->nomer }}</td>
                    <td>{{ $p->jam_mulai }}</td>
                    <td>{{ $p->durasi_jam }}</td>
                    <td>{{ ucfirst($p->status) }}</td>
                    <td>
                        @if($p->status == 'aktif')
                            <form action="{{ route('pesanan.selesai', $p->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">
                                    Selesaikan
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500">Selesai</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    console.log("Halaman pesanan siap dipakai!");
</script>
@endsection
