<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('author')
            ->latest()
            ->paginate(15);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|url|max:500',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Generate slug from title
        $slug = Str::slug($validated['title']);
        if (empty($slug)) {
            $slug = 'post-' . uniqid();
        }
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;
        $validated['author_id'] = auth()->id();
        $validated['is_published'] = $request->has('is_published');
        
        if (!$validated['is_published']) {
            $validated['published_at'] = null;
        } elseif (!$validated['published_at']) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'تم إنشاء المقال بنجاح');
    }

    public function show(BlogPost $blog)
    {
        $blog->load('author');
        return view('admin.blog.show', compact('blog'));
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|url|max:500',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Update slug if title changed
        if ($blog->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            if (empty($slug)) {
                $slug = 'post-' . uniqid();
            }
            
            $originalSlug = $slug;
            $counter = 1;
            while (BlogPost::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $slug;
        }

        $validated['is_published'] = $request->has('is_published');
        
        if (!$validated['is_published']) {
            $validated['published_at'] = null;
        } elseif (!$validated['published_at'] && !$blog->published_at) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'تم حذف المقال بنجاح');
    }
}
