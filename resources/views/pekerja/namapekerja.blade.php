<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Klien - Jasa Human</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4 text-center">Daftar Pekerja</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('dashboard.index') }}" 
           class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500 hover:bg-green-600 text-white mb-4 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">Nama</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">Umur</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">Jenis Kelamin</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">Negara</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($namapekerja as $k)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $k->nama }}</td>
                            <td class="px-4 py-2 border-b">{{ $k->umur }}</td>
                            <td class="px-4 py-2 border-b">{{ $k->jenis_kelamin }}</td>
                            <td class="px-4 py-2 border-b">{{ $k->negara }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        console.log("Halaman daftar pekerja siap dipakai!");
    </script>
</body>
</html>
