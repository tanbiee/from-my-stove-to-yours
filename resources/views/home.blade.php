<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From My Stove To Yours | Kitchen Archive</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="grainy min-h-screen">

<nav class="p-8 max-w-7xl mx-auto flex justify-between items-center animate-fade-in">
    <div class="text-2xl font-bold tracking-tighter text-vintage-terracotta">
        STOVE<span class="text-vintage-cream/50">TO</span>YOURS
    </div>
    <div class="flex items-center gap-8">
        <a href="/" class="text-sm font-bold uppercase tracking-widest text-vintage-terracotta border-b-2 border-vintage-terracotta pb-1">Home</a>
        <a href="/create" class="px-6 py-2 rounded-full bg-vintage-terracotta text-white text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-vintage-terracotta/20">
            Share Recipe
        </a>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-6 pt-12 pb-24">

    <!-- Hero Section -->
    <div class="grid lg:grid-cols-2 gap-16 items-center mb-32 animate-fade-in">
        <div class="space-y-8">
            <h1 class="text-6xl md:text-8xl font-bold leading-[0.9] text-vintage-cream">
                Delicious Food Is <br> <span class="text-vintage-terracotta">Waiting For You</span>
            </h1>
            <p class="text-vintage-cream/60 text-xl leading-relaxed max-w-lg">
                Our collection of hand-picked recipes brings the warmth of home cooking directly to your kitchen filing system.
            </p>
            <div class="flex gap-4 pt-4">
                <a href="/create" class="btn-terracotta">
                   Start Sharing
                </a>
            </div>
        </div>
        
        <div class="relative">
            <div class="circular-frame aspect-square w-full max-w-md mx-auto relative z-10">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1000&auto=format&fit=crop" 
                     class="w-full h-full object-cover" alt="Hero Dish">
            </div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-vintage-terracotta/20 rounded-full blur-[80px]"></div>
            <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-vintage-terracotta/10 rounded-full blur-[100px]"></div>
        </div>
    </div>

    <!-- Top List Section -->
    <div class="text-center mb-16 space-y-4">
        <h2 class="text-5xl font-bold text-vintage-cream">Top List</h2>
        <p class="text-vintage-cream/40 font-bold uppercase tracking-[0.3em] text-sm">Our mainstay menu</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        @foreach($recipes as $recipe)
        <div class="recipe-card group animate-slide-up" style="animation-delay: {{ $loop->index * 100 }}ms">
            <div class="relative -mt-20 mb-8 px-4">
                <div class="circular-frame shadow-2xl group-hover:scale-105 transition-transform duration-500">
                    <img src="{{ asset('images/'.$recipe->image) }}" 
                         class="w-full h-full object-cover" 
                         alt="{{ $recipe->title }}">
                </div>
                <div class="absolute top-4 right-8 bg-black/60 backdrop-blur px-3 py-1 rounded-full text-sm font-bold text-vintage-terracotta shadow-lg">
                    ★ {{ $recipe->rating }}
                </div>
            </div>

            <div class="text-center space-y-4">
                <h3 class="text-2xl font-bold text-vintage-cream group-hover:text-vintage-terracotta transition-colors">
                    {{ $recipe->title }}
                </h3>
                <p class="text-vintage-cream/50 text-sm line-clamp-2 px-4">
                    {{ $recipe->description }}
                </p>
                
                <div class="flex flex-col gap-4 pt-6 border-t border-white/5 mt-4">
                    <!-- Action Buttons -->
                    <div class="grid grid-cols-3 gap-2">
                        <a href="/recipe/{{ $recipe->id }}" 
                           class="flex items-center justify-center gap-1 py-2 rounded-xl bg-white/5 hover:bg-vintage-terracotta hover:text-white transition-all text-[10px] font-bold uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            View
                        </a>
                        <a href="/edit/{{ $recipe->id }}" 
                           class="flex items-center justify-center gap-1 py-2 rounded-xl bg-white/5 hover:bg-emerald-500 hover:text-white transition-all text-[10px] font-bold uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="/delete/{{ $recipe->id }}" method="POST" onsubmit="return confirm('Delete this record?')" class="contents">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="flex items-center justify-center gap-1 py-2 rounded-xl bg-white/5 hover:bg-red-500 hover:text-white transition-all text-[10px] font-bold uppercase tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

</body>
</html>