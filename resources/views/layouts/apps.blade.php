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
            <a href="{{ route('dashboard') }}" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
                <span class="mr-3 text-xl">📊</span>
                <span class="font-medium">Dashboard</span>
                <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-[var(--primary)]">→</span>
            </a>
            <a href="{{ route('pekerja.index') }}" class="group flex items-center py-3 px-4 rounded-xl transition-all duration-300">
                <span class="mr-3 text-xl">👥</span>
                <span class="font-medium">Pekerja</span>
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

        <!-- Yield untuk konten dashboard -->
        @yield('dashboard-content')

    </main>
</div>

@yield('scripts')

</body>
</html>