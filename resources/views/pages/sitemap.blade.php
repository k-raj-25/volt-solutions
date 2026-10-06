@extends('layouts.app')

@section('title', 'Sitemap – Volt Solutions')
@section('description', 'A complete list of pages on the Volt Solutions website.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Sitemap',
    'title' => 'Site<em>map.</em>',
    'lead' => 'Every page on the Volt Solutions website.',
])

<section class="section">
    <div class="container grid-3">
        <div>
            <h3>Main pages</h3>
            <ul class="sitemap-list" style="columns:1">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('loans') }}">Loans</a></li>
                <li><a href="{{ route('real-estate') }}">Real Estate</a></li>
                <li><a href="{{ route('careers') }}">Careers</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div>
            <h3>Legal</h3>
            <ul class="sitemap-list" style="columns:1">
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
            </ul>
        </div>
        <div>
            <h3>Blog</h3>
            <ul class="sitemap-list" style="columns:1">
                <li><a href="{{ route('blog.index') }}">All articles</a></li>
                @foreach ($posts as $post)
                    <li><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
