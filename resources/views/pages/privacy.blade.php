@extends('layouts.app')

@section('title', 'Privacy Policy – Volt Solutions')
@section('description', 'How Volt Solutions collects, uses and protects your personal information.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Privacy Policy',
    'title' => 'Privacy <em>policy.</em>',
    'lead' => 'How we collect, use and protect your information.',
])

<section class="section">
    <div class="container legal">
        <p>Volt Solutions ("we", "us") respects your privacy. This policy explains what information we collect through this website and how we use it.</p>

        <h2>1. Information we collect</h2>
        <p>When you contact us through the website we collect the details you provide, such as your name, email address, phone number and message. We may also collect basic technical data such as browser type and pages visited.</p>

        <h2>2. How we use your information</h2>
        <ul>
            <li>To respond to your enquiries about loans or real estate</li>
            <li>To provide and improve our services</li>
            <li>To meet legal and regulatory obligations</li>
        </ul>

        <h2>3. Sharing of information</h2>
        <p>We do not sell your personal information. We may share it with lending partners, property owners or service providers only as needed to deal with your request, or where required by law.</p>

        <h2>4. Data security</h2>
        <p>We take reasonable measures to protect your information. However, no method of transmission over the internet is completely secure.</p>

        <h2>5. Cookies</h2>
        <p>This website uses essential cookies to operate securely. We may use analytics cookies in future, and will update this policy if we do.</p>

        <h2>6. Your rights</h2>
        <p>You may request access to, correction of, or deletion of your personal data by contacting us at <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>.</p>

        <h2>7. Changes to this policy</h2>
        <p>We may update this policy from time to time. The latest version will always be available on this page.</p>

        <p class="notice">This is a template policy. The client should review it with a qualified legal adviser before publishing.</p>
    </div>
</section>
@endsection
