@extends('layouts.app')

@section('title', 'Edit Entry')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    
    <div class="flex justify-end mb-16 animate-fade-in">
        <a href="/recipe/{{ $recipe->id }}" class="text-sm font-bold uppercase tracking-widest text-vintage-cream/60 hover:text-vintage-terracotta transition-colors">
            ← Discard Changes
        </a>
    </div>

    <div class="space-y-12 animate-slide-up">
        <div class="space-y-4">
            <h1 class="text-6xl font-bold text-vintage-cream leading-[0.9]">
                Amend <br> <span class="text-vintage-terracotta">Recipe Record</span>
            </h1>
            <p class="text-vintage-cream/40 font-bold uppercase tracking-[0.3em] text-sm">Refining the culinary documentation</p>
        </div>

        <form action="/update/{{ $recipe->id }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            @method('PUT')
            
            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Dish Designation</label>
                    <input type="text" name="title" value="{{ $recipe->title }}" required class="input-vintage">
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Regional Origin</label>
                    <select name="origin" required class="input-vintage appearance-none cursor-pointer">
                        @php
                            $origins = ['Indian', 'Chinese', 'Italian', 'French', 'Japanese', 'Mexican', 'Thai', 'American', 'Other'];
                        @endphp
                        @foreach($origins as $origin)
                            <option value="{{ $origin }}" {{ $recipe->origin == $origin ? 'selected' : '' }}>{{ $origin }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Culinary Rating (1-5)</label>
                    <input type="number" name="rating" value="{{ $recipe->rating }}" required min="1" max="5" class="input-vintage">
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Update Visuals</label>
                    <div class="relative group">
                        <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="input-vintage flex items-center justify-between group-hover:border-vintage-terracotta transition-colors">
                            <span class="text-vintage-cream/30 italic">Change photograph...</span>
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/'.$recipe->image) }}" class="w-8 h-8 rounded-full object-cover">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-vintage-terracotta" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Brief Description</label>
                <textarea name="description" required rows="3" class="input-vintage min-h-[100px] resize-none">{{ $recipe->description }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Ingredients List</label>
                    <textarea name="ingredients" required rows="10" class="input-vintage min-h-[300px]">{{ $recipe->ingredients }}</textarea>
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Preparation Method</label>
                    <textarea name="process" required rows="10" class="input-vintage min-h-[300px]">{{ $recipe->process }}</textarea>
                </div>
            </div>

            <div class="pt-10">
                <button type="submit" class="btn-terracotta w-full py-6 text-xl tracking-widest uppercase">
                    Save Amendments
                </button>
            </div>
        </form>
    </div>
</div>
@endsection