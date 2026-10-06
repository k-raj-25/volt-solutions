@extends('layouts.app')

@section('title', 'Page not found – Volt Solutions')

@section('content')
<section class="section">
    <div class="container center">
        <span class="eyebrow">Error 404</span>
        <h1>We couldn't find that page</h1>
        <p class="lead">The page may have moved or no longer exists.</p>
        <p><a class="btn btn-primary" href="{{ route('home') }}">Back to Home</a></p>
    </div>
</section>
@endsection
