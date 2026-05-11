<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $featuredBlog = Blog::where('is_featured', true)->first();
        $blogs = Blog::when($featuredBlog, function ($query) use ($featuredBlog) {
            return $query->where('_id', '!=', $featuredBlog->_id);
        })->get();
        
        return view('blogs.index', compact('blogs', 'featuredBlog'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
            'cover_image_url' => 'nullable|url',
            'read_time_min' => 'required|integer|min:1',
        ]);

        Blog::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'cover_image_url' => $request->cover_image_url ?? 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'is_featured' => $request->has('is_featured'),
            'read_time_min' => $request->read_time_min,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }
}
