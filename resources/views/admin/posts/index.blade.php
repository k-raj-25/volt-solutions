@extends('admin.layout')
@section('title', 'Blog posts')

@section('content')
<header>
    <h1>Blog posts</h1>
    <a class="btn btn-gold" href="{{ route('admin.posts.create') }}">New post</a>
</header>

<div class="box">
    <div class="table-wrap">
        <table>
            <thead><tr><th>Title</th><th>Author</th><th>Category</th><th>Status</th><th>Published</th><th>Views</th><th></th></tr></thead>
            <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td><strong>{{ $post->title }}</strong></td>
                    <td>{{ $post->author_name }}</td>
                    <td>{{ $post->category_label }}</td>
                    <td><span class="status-pill {{ $post->status }}">{{ ucfirst($post->status) }}</span></td>
                    <td>{{ $post->published_at?->format('d M Y') ?? '—' }}</td>
                    <td>{{ $post->view_count }}</td>
                    <td>
                        <div class="row-actions">
                            @if ($post->status === 'published')
                                <a class="btn btn-outline btn-sm" href="{{ route('blog.show', $post->slug) }}" target="_blank" rel="noopener">View</a>
                            @endif
                            <a class="btn btn-outline btn-sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post permanently?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">No posts yet. <a href="{{ route('admin.posts.create') }}">Write your first post</a>.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $posts->links('partials.pagination') }}
</div>
@endsection
