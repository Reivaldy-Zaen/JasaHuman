<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jasa Human</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        <!-- Alert Error -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Alert Success (opsional) -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" 
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-green-400" 
                    required>
            </div>

            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" 
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-green-400" 
                    required>
            </div>

            <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded">
                Login
            </button>
        </form>
    </div>

</body>
</html>
