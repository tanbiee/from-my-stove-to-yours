@extends('layouts.app')

@section('content')
<div class="space-y-12">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-bold text-[#3d3329] mb-3">Culinary Stories & Tips</h1>
            <p class="text-lg text-gray-600 max-w-2xl">Discover new techniques, read about different cuisines, and get inspired for your next meal.</p>
        </div>
        <a href="{{ route('blogs.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-full font-medium transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            + Write a Blog
        </a>
    </div>

    <!-- Filters -->
    <div class="flex gap-4 border-b border-gray-200 pb-4 overflow-x-auto">
        <button class="px-5 py-2 rounded-full bg-amber-100 text-amber-800 font-medium whitespace-nowrap">All Posts</button>
        <button class="px-5 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-50 border border-gray-200 font-medium whitespace-nowrap transition-colors">Food Science</button>
        <button class="px-5 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-50 border border-gray-200 font-medium whitespace-nowrap transition-colors">Meal Planning</button>
        <button class="px-5 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-50 border border-gray-200 font-medium whitespace-nowrap transition-colors">Tips & Techniques</button>
    </div>

    @if($featuredBlog)
    <!-- Featured Blog -->
    <div class="relative rounded-3xl overflow-hidden group shadow-xl">
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition-colors z-10"></div>
        <img src="{{ $featuredBlog->cover_image_url }}" alt="{{ $featuredBlog->title }}" class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700">
        
        <div class="absolute bottom-0 left-0 right-0 p-10 z-20">
            <span class="inline-block bg-amber-500 text-white text-xs font-bold uppercase tracking-wider py-1.5 px-3 rounded-md mb-4 shadow-sm">Featured</span>
            <span class="inline-block bg-white/20 backdrop-blur-md text-white text-xs font-medium py-1.5 px-3 rounded-md mb-4 ml-2">{{ $featuredBlog->category }}</span>
            <h2 class="text-4xl font-bold text-white mb-4 leading-tight drop-shadow-md">{{ $featuredBlog->title }}</h2>
            <div class="flex items-center text-white/90 text-sm gap-4">
                <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ $featuredBlog->read_time_min }} min read</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($blogs as $blog)
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group flex flex-col h-full transform hover:-translate-y-1">
            <div class="relative h-56 overflow-hidden">
                <img src="{{ $blog->cover_image_url }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute top-4 left-4">
                    <span class="bg-white/90 backdrop-blur-sm text-[#4a4036] text-xs font-semibold py-1 px-3 rounded-full shadow-sm">{{ $blog->category }}</span>
                </div>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-[#3d3329] mb-3 line-clamp-2 group-hover:text-amber-600 transition-colors">{{ $blog->title }}</h3>
                <p class="text-gray-500 mb-6 line-clamp-3 text-sm flex-grow">{{ Str::limit($blog->content, 120) }}</p>
                
                <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                    <span class="text-sm text-gray-500 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                        {{ $blog->read_time_min }} min read
                    </span>
                    <a href="#" class="text-amber-600 font-medium text-sm flex items-center gap-1 hover:gap-2 transition-all">Read more <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($blogs->isEmpty() && !$featuredBlog)
        <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
            <div class="text-6xl mb-4">📝</div>
            <h3 class="text-2xl font-bold text-[#3d3329] mb-2">No blogs yet</h3>
            <p class="text-gray-500 mb-6">Be the first to share your culinary thoughts!</p>
            <a href="{{ route('blogs.create') }}" class="inline-block bg-amber-600 text-white px-6 py-2.5 rounded-full font-medium">Write a Blog</a>
        </div>
    @endif
</div>
@endsection
