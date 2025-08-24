<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Klien - Jasa Human</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <!-- Judul -->
        <h1 class="text-2xl font-bold mb-6 text-center">Daftar Klien</h1>

        <!-- Pesan sukses -->
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded-lg shadow mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol kembali -->
        <a href="{{ route('dashboard') }}" 
           class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500 hover:bg-green-600 text-white mb-6 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <!-- Card Tabel -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">No</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Nama</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700 border-b">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($klien as $k)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b">{{ $k->nama }}</td>
                            <td class="px-4 py-2 border-b">{{ $k->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        console.log("Halaman daftar klien siap dipakai!");
    </script>
</body>
</html>
