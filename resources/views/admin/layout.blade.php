<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') – Volt Solutions</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('head')
</head>
<body class="admin-body">
@php($unread = \App\Models\Message::where('is_read', false)->count())
<div class="admin">
    <aside class="admin-side">
        <img src="{{ asset('images/logo.png') }}" alt="Volt Solutions">
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><x-icon name="dashboard" width="18" height="18" /> Dashboard</a>
            <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"><x-icon name="edit" width="18" height="18" /> Blog Posts</a>
            <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"><x-icon name="mail" width="18" height="18" /> Messages @if ($unread)<span class="badge">{{ $unread }}</span>@endif</a>
            <a href="{{ route('admin.password') }}" class="{{ request()->routeIs('admin.password') ? 'active' : '' }}"><x-icon name="shield" width="18" height="18" /> Password</a>
        </nav>
        <div class="push">
            <a class="btn btn-outline btn-sm" href="{{ route('home') }}" target="_blank" rel="noopener" style="margin-bottom:8px;display:flex;justify-content:center">View site</a>
            <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-primary btn-sm" style="width:100%;justify-content:center">Log out</button></form>
        </div>
    </aside>
    <main class="admin-main">
        @if (session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
        @yield('content')
    </main>
</div>
@stack('scripts')
</body>
</html>
