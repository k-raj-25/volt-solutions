<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = trim((string) $request->query('q'));

        $posts = Post::published()
            ->when(array_key_exists((string) $category, Post::CATEGORIES), fn ($q) => $q->where('category', $category))
            ->when($search !== '', fn ($q) => $q->where(fn ($w) => $w
                ->where('title', 'like', "%{$search}%")
                ->orWhere('excerpt', 'like', "%{$search}%")
                ->orWhere('tags', 'like', "%{$search}%")))
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('blog.index', compact('posts', 'category', 'search'));
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        $post->increment('view_count');

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest('published_at')->take(3)->get();

        return view('blog.show', compact('post', 'related'));
    }
}
