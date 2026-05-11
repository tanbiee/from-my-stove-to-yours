@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('blogs.index') }}" class="text-gray-500 hover:text-amber-600 flex items-center gap-2 mb-4 transition-colors w-fit">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Blogs
        </a>
        <h1 class="text-4xl font-bold text-[#3d3329]">Write a New Blog</h1>
        <p class="text-gray-600 mt-2">Share your kitchen experiments, tips, and culinary adventures.</p>
    </div>

    <form action="{{ route('blogs.store') }}" method="POST" class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 space-y-6 relative overflow-hidden">
        @csrf
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-amber-400 to-orange-500"></div>

        <div>
            <label for="title" class="block text-sm font-semibold text-[#4a4036] mb-2">Blog Title</label>
            <input type="text" name="title" id="title" class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 px-4 py-3 outline-none transition-colors border" placeholder="e.g., 10 Essential Knife Skills Every Home Cook Needs" required>
            @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category" class="block text-sm font-semibold text-[#4a4036] mb-2">Category</label>
                <select name="category" id="category" class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 px-4 py-3 outline-none transition-colors border appearance-none" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Food Science">Food Science</option>
                    <option value="Meal Planning">Meal Planning</option>
                    <option value="Tips & Techniques">Tips & Techniques</option>
                    <option value="Personal Stories">Personal Stories</option>
                </select>
                @error('category')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="read_time_min" class="block text-sm font-semibold text-[#4a4036] mb-2">Read Time (minutes)</label>
                <input type="number" name="read_time_min" id="read_time_min" min="1" class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 px-4 py-3 outline-none transition-colors border" placeholder="e.g., 8" required>
                @error('read_time_min')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label for="cover_image_url" class="block text-sm font-semibold text-[#4a4036] mb-2">Cover Image URL</label>
            <input type="url" name="cover_image_url" id="cover_image_url" class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 px-4 py-3 outline-none transition-colors border" placeholder="https://example.com/image.jpg">
            <p class="text-gray-400 text-xs mt-1.5">Leave blank for a random food image.</p>
            @error('cover_image_url')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-[#4a4036] mb-2">Content</label>
            <textarea name="content" id="content" rows="12" class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 px-4 py-3 outline-none transition-colors border resize-y" placeholder="Write your culinary story here..." required></textarea>
            @error('content')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-3 bg-amber-50 p-4 rounded-xl border border-amber-100">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" class="w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500 cursor-pointer">
            <label for="is_featured" class="text-sm font-medium text-amber-900 cursor-pointer">Set as Featured Post</label>
        </div>

        <div class="pt-4 flex justify-end gap-4 border-t border-gray-100">
            <a href="{{ route('blogs.index') }}" class="px-6 py-3 rounded-full font-medium text-gray-600 hover:bg-gray-100 transition-colors">Cancel</a>
            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-full font-medium transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                Publish Blog
            </button>
        </div>
    </form>
</div>
@endsection
