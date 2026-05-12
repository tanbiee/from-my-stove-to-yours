<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Recipe World') | Gourmet Delights</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body>

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2 group">
                <div class="w-12 h-12 bg-gradient-to-tr from-gourmet-orange to-gourmet-coral rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg group-hover:rotate-12 transition-transform">
                    🍴
                </div>
                <span class="text-2xl font-bold tracking-tight text-gourmet-dark">Recipe<span class="text-gourmet-orange italic">World</span></span>
            </a>

            <div class="flex items-center gap-6">
                <a href="/create" class="btn-orange flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Recipe
                </a>
            </div>
        </div>
    </nav>

    <main class="min-h-[calc(100vh-5rem)]">
        @yield('content')
    </main>

    <footer class="py-12 bg-white border-t border-slate-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-slate-400 font-medium">© 2024 Recipe World. Crafted for the love of food.</p>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
