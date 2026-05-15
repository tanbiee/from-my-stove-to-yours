<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'From My Stove To Yours') | Kitchen Archive</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="grainy min-h-screen">

    <!-- Navigation -->
    <nav class="p-8 max-w-7xl mx-auto flex justify-between items-center animate-fade-in">
        <a href="/" class="text-2xl font-bold tracking-tighter text-vintage-terracotta">
            STOVE<span class="text-vintage-cream/50">TO</span>YOURS
        </a>
        <div class="flex items-center gap-8">
            <a href="/" class="text-sm font-bold uppercase tracking-widest {{ Request::is('/') ? 'text-vintage-terracotta border-b-2 border-vintage-terracotta pb-1' : 'text-vintage-cream/60 hover:text-vintage-terracotta transition-colors' }}">Home</a>
            <a href="/create" class="px-6 py-2 rounded-full bg-vintage-terracotta text-white text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-vintage-terracotta/20">
                Share Recipe
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="py-12 border-t border-white/5 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-vintage-cream/30 text-sm font-bold uppercase tracking-widest">© 2024 From My Stove To Yours. A Kitchen Archive.</p>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
