<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('site.name').' – '.config('site.tagline'))</title>
    <meta name="description" content="@yield('description', 'Volt Solutions offers trusted financial loans and real estate services under one roof. Your financial fortress.')">
    <meta property="og:title" content="@yield('title', config('site.name'))">
    <meta property="og:description" content="@yield('description', 'Trusted financial loans and real estate services.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta name="theme-color" content="#f6f3ec">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('head')
</head>
<body>
@php
    $links = [
        ['home', 'Home'], ['about', 'About'], ['loans', 'Loans'],
        ['real-estate', 'Real Estate'], ['blog.index', 'Blog'], ['careers', 'Careers'],
    ];
@endphp
<header class="site-header">
    <div class="container">
        <a class="brand" href="{{ route('home') }}" aria-label="Volt Solutions home"><img src="{{ asset('images/logo.png') }}" alt="Volt Solutions – Your Financial Fortress"></a>
        <nav class="nav" aria-label="Main">
            @foreach ($links as [$route, $label])
                <a href="{{ route($route) }}" class="{{ request()->routeIs($route === 'blog.index' ? 'blog.*' : $route) ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </nav>
        <div class="header-cta">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Contact Us</a>
            <button class="nav-toggle" aria-label="Toggle menu" aria-expanded="false"><x-icon name="menu" width="22" height="22" /></button>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-big">Let's build your <em>financial fortress.</em></div>
        <div class="footer-grid">
            <div>
                <a class="footer-logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Volt Solutions"></a>
                <p>Trusted financial loans and real estate guidance, built on transparency and long-term relationships.</p>
            </div>
            <div>
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('careers') }}">Careers</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4>What We Do</h4>
                <ul>
                    <li><a href="{{ route('loans') }}">Financial Loans</a></li>
                    <li><a href="{{ route('real-estate') }}">Real Estate</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
                </ul>
            </div>
            <div>
                <h4>Get in Touch</h4>
                <ul>
                    <li>{{ config('site.address') }}</li>
                    <li><a href="tel:{{ preg_replace('/\s+/', '', config('site.phone')) }}">{{ config('site.phone') }}</a></li>
                    <li><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></li>
                </ul>
            </div>
        </div>
        <p class="disclaimer">Loan approvals are subject to eligibility, documentation and the lender's credit assessment. Interest rates and terms may vary. Property information is indicative and should be independently verified before any transaction.</p>
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} {{ config('site.name') }}. All rights reserved.</span>
            <span>{{ config('site.tagline') }}</span>
        </div>
    </div>
</footer>
<script src="{{ asset('js/site.js') }}" defer></script>
@stack('scripts')
</body>
</html>
