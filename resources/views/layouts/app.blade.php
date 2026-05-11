<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From My Stove To Yours</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #fcf9f2; /* Beige theme */
            color: #4a4036;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-amber-600 tracking-tight flex items-center gap-2">
                        <span>🍳</span> From My Stove To Yours
                    </a>
                </div>
                <div class="flex items-center space-x-6 text-sm font-medium">
                    <a href="#" class="text-gray-600 hover:text-amber-600 transition-colors">Recipes</a>
                    <a href="{{ route('blogs.index') }}" class="text-amber-600 border-b-2 border-amber-600 pb-1">Blogs</a>
                    <a href="#" class="text-gray-600 hover:text-amber-600 transition-colors">Profile</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#4a4036] text-amber-50 py-10 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 From My Stove To Yours. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
