<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->title }} | Archive</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="grainy min-h-screen pb-24">

    <div class="max-w-7xl mx-auto py-12 px-6">
        
        <!-- Navigation -->
        <div class="flex justify-between items-center mb-24 animate-fade-in">
            <a href="/" class="flex items-center gap-4 group">
                <div class="w-12 h-12 border border-white/20 rounded-full flex items-center justify-center text-vintage-cream group-hover:bg-vintage-terracotta group-hover:border-vintage-terracotta transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </div>
                <span class="font-bold text-lg uppercase tracking-widest text-vintage-cream/60 group-hover:text-vintage-terracotta transition-colors">Return to Archive</span>
            </a>

            <div class="flex gap-4">
                <a href="/edit/{{ $recipe->id }}" class="px-8 py-3 rounded-full border border-white/20 font-bold hover:bg-vintage-terracotta hover:border-vintage-terracotta transition-all">
                    Edit Record
                </a>
                <form action="/delete/{{ $recipe->id }}" method="POST" onsubmit="return confirm('Archive deletion cannot be undone. Proceed?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-8 py-3 rounded-full border border-red-500/30 text-red-400 font-bold hover:bg-red-500 hover:text-white transition-all">
                        Remove
                    </button>
                </form>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-20 items-center animate-slide-up">
            <!-- Image Section -->
            <div class="relative">
                <div class="circular-frame aspect-square w-full max-w-lg mx-auto relative z-10 border-[12px] border-white/5">
                    <img
                        src="{{ asset('images/'.$recipe->image) }}"
                        alt="{{ $recipe->title }}"
                        class="w-full h-full object-cover"
                    >
                </div>
                <div class="absolute -top-10 -left-10 w-60 h-60 bg-vintage-terracotta/20 rounded-full blur-[100px]"></div>
            </div>

            <!-- Info Section -->
            <div class="space-y-10">
                <div class="space-y-4">
                    <span class="text-vintage-terracotta font-bold uppercase tracking-[0.4em] text-sm">Recipe File No.{{ $recipe->id }}</span>
                    <h1 class="text-6xl lg:text-7xl font-bold text-vintage-cream leading-[0.9]">
                        {{ $recipe->title }}
                    </h1>
                </div>

                <div class="flex items-center gap-6">
                    <div class="flex gap-1 text-vintage-terracotta">
                        @for($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $i < $recipe->rating ? 'fill-current' : 'text-white/10' }}" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-vintage-cream/30 font-bold">|</span>
                    <span class="text-vintage-cream/60 font-bold uppercase tracking-widest text-sm">{{ $recipe->origin }} Cuisine</span>
                </div>

                <p class="text-vintage-cream/70 text-xl leading-relaxed italic border-l-4 border-vintage-terracotta pl-8 py-2">
                    {{ $recipe->description }}
                </p>

                <div class="grid grid-cols-2 gap-10 pt-10">
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold text-vintage-cream flex items-center gap-3">
                            <span class="w-8 h-px bg-vintage-terracotta"></span>
                            Ingredients
                        </h2>
                        <div class="space-y-4 text-vintage-cream/60 text-lg">
                            @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                                @if(trim($ingredient))
                                <div class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 rounded-full bg-vintage-terracotta"></div>
                                    {{ $ingredient }}
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold text-vintage-cream flex items-center gap-3">
                            <span class="w-8 h-px bg-vintage-terracotta"></span>
                            The Method
                        </h2>
                        <div class="text-vintage-cream/60 text-lg leading-loose whitespace-pre-line">
                            {{ $recipe->process }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>