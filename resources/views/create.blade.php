@extends('layouts.app')

@section('title', 'New Entry')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    
    <div class="flex justify-end mb-16 animate-fade-in">
        <a href="/" class="text-sm font-bold uppercase tracking-widest text-vintage-cream/60 hover:text-vintage-terracotta transition-colors">
            ← Archive Gallery
        </a>
    </div>

    <div class="space-y-12 animate-slide-up">
        <div class="space-y-4">
            <h1 class="text-6xl font-bold text-vintage-cream leading-[0.9]">
                New Recipe <br> <span class="text-vintage-terracotta">Registration</span>
            </h1>
            <p class="text-vintage-cream/40 font-bold uppercase tracking-[0.3em] text-sm">Fill your digital filing cabinet</p>
        </div>

        <form action="/store" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Dish Designation</label>
                    <input type="text" name="title" required placeholder="Title of your masterpiece" 
                           class="input-vintage">
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Regional Origin</label>
                    <select name="origin" required class="input-vintage appearance-none cursor-pointer">
                        <option value="Indian">Indian</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Italian">Italian</option>
                        <option value="French">French</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Mexican">Mexican</option>
                        <option value="Thai">Thai</option>
                        <option value="American">American</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Culinary Rating (1-5)</label>
                    <input type="number" name="rating" required min="1" max="5" placeholder="5" 
                           class="input-vintage">
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Visual Documentation</label>
                    <div class="relative group">
                        <input type="file" name="image" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="input-vintage flex items-center justify-between group-hover:border-vintage-terracotta transition-colors">
                            <span class="text-vintage-cream/30 italic">Select photograph...</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-vintage-terracotta" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Brief Description</label>
                <textarea name="description" required rows="3" placeholder="Tell the story..." 
                          class="input-vintage min-h-[100px] resize-none"></textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Ingredients List</label>
                    <textarea name="ingredients" required rows="10" placeholder="List magic elements..." 
                              class="input-vintage min-h-[300px]"></textarea>
                </div>
                <div class="space-y-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-vintage-terracotta">Preparation Method</label>
                    <textarea name="process" required rows="10" placeholder="Describe the magic..." 
                              class="input-vintage min-h-[300px]"></textarea>
                </div>
            </div>

            <div class="pt-10">
                <button type="submit" class="btn-terracotta w-full py-6 text-xl tracking-widest uppercase">
                    Commit to Archive
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
