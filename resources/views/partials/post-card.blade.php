<article class="post-card">
    <a class="post-cover" href="{{ route('blog.show', $post->slug) }}" tabindex="-1" aria-hidden="true">
        <img src="{{ $post->display_cover }}" alt="" loading="lazy">
    </a>
    <div class="post-body">
        <div style="margin-bottom:10px"><span class="tag {{ $post->category === 'real-estate' ? 'green' : '' }}">{{ $post->category_label }}</span></div>
        <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
        <p>{{ \Illuminate\Support\Str::limit($post->summary, 130) }}</p>
        <div class="meta">
            <span>By {{ $post->author_name }}</span>
            <span>{{ $post->published_at?->format('d M Y') }}</span>
            <span>{{ $post->reading_time }} min read</span>
        </div>
    </div>
</article>
