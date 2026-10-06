@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<header>
    <h1>Dashboard</h1>
    <a class="btn btn-gold" href="{{ route('admin.posts.create') }}">New post</a>
</header>

<div class="stats">
    <div class="box"><strong>{{ $published }}</strong><span>Published posts</span></div>
    <div class="box"><strong>{{ $drafts }}</strong><span>Drafts</span></div>
    <div class="box"><strong>{{ $unread }}</strong><span>Unread messages</span></div>
    <div class="box"><strong>{{ number_format($views) }}</strong><span>Total post views</span></div>
</div>

<div class="box">
    <h3>Recent posts</h3>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Title</th><th>Status</th><th>Updated</th><th></th></tr></thead>
            <tbody>
            @forelse ($recent as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td><span class="status-pill {{ $post->status }}">{{ ucfirst($post->status) }}</span></td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td><a class="btn btn-outline btn-sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a></td>
                </tr>
            @empty
                <tr><td colspan="4">No posts yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
