<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('admin.posts.form', ['post' => new Post(['status' => 'draft', 'author_name' => auth()->user()->name])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Post::uniqueSlug($data['title']);
        $data = $this->prepare($request, $data);

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post saved.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validated($request);
        $data['slug'] = Post::uniqueSlug($data['title'], $post->id);
        $data = $this->prepare($request, $data, $post);

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk(config('filesystems.uploads_disk'))->delete($post->cover_image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'author_name' => ['required', 'string', 'max:100'],
            'category' => ['required', Rule::in(array_keys(Post::CATEGORIES))],
            'excerpt' => ['nullable', 'string', 'max:400'],
            'body' => ['required', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:200'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);
    }

    private function prepare(Request $request, array $data, ?Post $post = null): array
    {
        $data['body'] = Purifier::clean($data['body']);

        if ($data['status'] === 'published') {
            $data['published_at'] = ! empty($data['published_at'])
                ? $data['published_at']
                : ($post?->published_at ?? now());
        } else {
            $data['published_at'] = $data['published_at'] ?? null;
        }

        unset($data['cover_image']);
        if ($request->hasFile('cover_image')) {
            if ($post?->cover_image) {
                Storage::disk(config('filesystems.uploads_disk'))->delete($post->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('posts', config('filesystems.uploads_disk'));
        } elseif ($request->boolean('remove_cover') && $post?->cover_image) {
            Storage::disk(config('filesystems.uploads_disk'))->delete($post->cover_image);
            $data['cover_image'] = null;
        }

        return $data;
    }
}
