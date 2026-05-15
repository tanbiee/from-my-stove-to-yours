@extends('layouts.app')

@section('title', 'Kitchen Archive')

@section('content')
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
    <div class="text-center mb-10 space-y-4">
        <h2 class="text-5xl font-bold text-vintage-cream">Top List</h2>
        <p class="text-vintage-cream/40 font-bold uppercase tracking-[0.3em] text-sm">Our mainstay menu</p>
    </div>

    <!-- Cuisine Filter Bar -->
    <div class="flex flex-wrap justify-center gap-3 mb-16 animate-fade-in">
        @php
            $currentOrigin = request()->segment(2);
            $cuisines = [
                ['label' => 'All', 'slug' => null, 'icon' => '🍽️'],
                ['label' => 'Indian', 'slug' => 'Indian', 'icon' => '🍛'],
                ['label' => 'Chinese', 'slug' => 'Chinese', 'icon' => '🥡'],
                ['label' => 'Italian', 'slug' => 'Italian', 'icon' => '🍝'],
                ['label' => 'Mexican', 'slug' => 'Mexican', 'icon' => '🌮'],
                ['label' => 'Thai', 'slug' => 'Thai', 'icon' => '🍜'],
                ['label' => 'American', 'slug' => 'American', 'icon' => '🍔'],
            ];
        @endphp

        @foreach($cuisines as $cuisine)
            @php
                $isActive = ($cuisine['slug'] === null && !$currentOrigin) || $currentOrigin === $cuisine['slug'];
                $url = $cuisine['slug'] ? '/sort/' . $cuisine['slug'] : '/';
            @endphp
            <a href="{{ $url }}" 
               class="cuisine-filter-btn {{ $isActive ? 'active' : '' }}">
                <span class="text-lg">{{ $cuisine['icon'] }}</span>
                <span>{{ $cuisine['label'] }}</span>
            </a>
        @endforeach
    </div>

    <!-- Recipe Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24 mt-20">
        @forelse($recipes as $recipe)
        <a href="/recipe/{{ $recipe->id }}" class="recipe-card group animate-slide-up block cursor-pointer" style="animation-delay: {{ $loop->index * 100 }}ms">
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
                
                <!-- Cuisine Badge -->
                <div class="pt-4 border-t border-white/5 mt-4">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-vintage-terracotta/10 border border-vintage-terracotta/20 text-vintage-terracotta text-xs font-bold uppercase tracking-widest">
                        {{ $recipe->origin }} Cuisine
                    </span>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full text-center py-20 animate-fade-in">
            <div class="text-6xl mb-6">🍳</div>
            <h3 class="text-2xl font-bold text-vintage-cream/60 mb-2">No Recipes Found</h3>
            <p class="text-vintage-cream/30 mb-8">No recipes match this cuisine filter yet.</p>
            <a href="/" class="btn-terracotta inline-flex">View All Recipes</a>
        </div>
        @endforelse
    </div>

</div>
@endsection