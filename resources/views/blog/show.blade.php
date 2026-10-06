@extends('layouts.app')

@section('title', $post->title.' – Volt Solutions')
@section('description', $post->meta_description ?: \Illuminate\Support\Str::limit($post->summary, 155))
@section('og_type', 'article')
@if ($post->cover_url)
    @section('og_image', $post->cover_url)
@endif

@section('content')
<section class="section" style="padding-top:48px">
    <div class="container">
        <article class="article">
            <div class="breadcrumb"><a href="{{ route('home') }}">Home</a> / <a href="{{ route('blog.index') }}">Blog</a> / {{ $post->category_label }}</div>
            <span class="tag {{ $post->category === 'real-estate' ? 'green' : '' }}">{{ $post->category_label }}</span>
            <h1 style="margin-top:12px">{{ $post->title }}</h1>
            <div class="meta">
                <span>By <strong>{{ $post->author_name }}</strong></span>
                <span>{{ $post->published_at?->format('d M Y') }}</span>
                <span>{{ $post->reading_time }} min read</span>
                <span>{{ number_format($post->view_count) }} views</span>
            </div>

            @if ($post->cover_url)
                <div class="article-cover"><img src="{{ $post->cover_url }}" alt="{{ $post->title }}"></div>
            @endif

            <div class="prose">{!! $post->body !!}</div>

            @if (count($post->tag_list))
                <p style="margin-top:28px">
                    @foreach ($post->tag_list as $t)<span class="tag" style="margin-right:6px">#{{ $t }}</span>@endforeach
                </p>
            @endif

            <div class="author-box">
                <div class="avatar">{{ strtoupper(mb_substr($post->author_name, 0, 1)) }}</div>
                <div><strong>{{ $post->author_name }}</strong><br><span class="meta">Published {{ $post->published_at?->format('d M Y') }}</span></div>
            </div>

            @php($shareUrl = urlencode(url()->current()))
            <div class="share">
                <strong>Share:</strong>
                <a class="btn btn-outline btn-sm" target="_blank" rel="noopener" href="https://wa.me/?text={{ urlencode($post->title.' '.url()->current()) }}">WhatsApp</a>
                <a class="btn btn-outline btn-sm" target="_blank" rel="noopener" href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}">LinkedIn</a>
                <a class="btn btn-outline btn-sm" target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}">Facebook</a>
            </div>
        </article>
    </div>
</section>

@if ($related->count())
<section class="section soft">
    <div class="container">
        <div class="section-head"><h2>Related articles</h2></div>
        <div class="grid-3">
            @foreach ($related as $r)
                @include('partials.post-card', ['post' => $r])
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
