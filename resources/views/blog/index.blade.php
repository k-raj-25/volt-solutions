@extends('layouts.app')

@section('title', 'Blog – Business Funding, Real Estate & Finance Tips | Volt Solutions')
@section('description', 'Articles and guides on business funding, real estate and finance from the Volt Solutions team.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Blog',
    'title' => 'The <em>blog.</em>',
    'lead' => 'Insights, guides and news on business funding, property and finance.',
])

<section class="section">
    <div class="container">
        <div class="filters">
            <div class="chips">
                <a class="chip {{ ! $category ? 'active' : '' }}" href="{{ route('blog.index') }}">All</a>
                @foreach (\App\Models\Post::CATEGORIES as $slug => $label)
                    <a class="chip {{ $category === $slug ? 'active' : '' }}" href="{{ route('blog.index', ['category' => $slug]) }}">{{ $label }}</a>
                @endforeach
            </div>
            <form class="search" method="GET" action="{{ route('blog.index') }}">
                @if ($category)<input type="hidden" name="category" value="{{ $category }}">@endif
                <input type="search" name="q" value="{{ $search }}" placeholder="Search articles" aria-label="Search articles">
                <button class="btn btn-primary btn-sm" type="submit">Search</button>
            </form>
        </div>

        @if ($posts->count())
            <div class="grid-3">
                @foreach ($posts as $post)
                    @include('partials.post-card', ['post' => $post])
                @endforeach
            </div>
            {{ $posts->links('partials.pagination') }}
        @else
            <p class="center lead">No articles found.</p>
        @endif
    </div>
</section>
@endsection
