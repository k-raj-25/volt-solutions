@extends('layouts.app')

@section('title', 'About Us – Volt Solutions')
@section('description', 'Learn about Volt Solutions: our story, mission and the values behind our funding and real estate services.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'About',
    'title' => 'About <em>us.</em>',
    'lead' => 'We help businesses secure fast, clear funding and help families find property with confidence.',
    'facts' => [['Focus', 'Business funding and real estate'], ['Approach', 'Transparent and personal'], ['Promise', 'Your financial fortress']],
    'image' => 'city',
    'alt' => 'Aerial view of a busy city',
    'tag' => 'One team, two services',
])

<section class="section">
    <div class="container split">
        <div>
            <span class="eyebrow">Our Story</span>
            <h2>Built to be your financial fortress</h2>
            <p>Volt Solutions began with a simple belief: financial decisions should feel safe, not stressful. We saw that business owners often needed both quick funding and a property advisor, and had to deal with separate parties for each.</p>
            <p>So we brought both together. Today we offer business funding and real estate services under one roof, with a team that takes the time to understand your situation.</p>
            <ul class="checklist">
                <li>Clear, honest advice with no hidden charges</li>
                <li>One team for both funding and property</li>
                <li>Support from first enquiry to after-sales</li>
            </ul>
        </div>
        <div class="panel navy panel-photo" style="--panel-img:url('{{ asset('images/photos/villa-night.jpg') }}')">
            <h3>Our Mission</h3>
            <p>To make borrowing and property ownership accessible, transparent and secure for every client we serve.</p>
            <h3 style="margin-top:24px">Our Vision</h3>
            <p style="margin-bottom:0">To be the most trusted name in financial and real estate solutions in the communities we serve.</p>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Our Values</span>
            <h2>What we stand for</h2>
        </div>
        <div class="grid-4">
            <div class="card"><div class="icon"><x-icon name="shield" /></div><h3>Integrity</h3><p>We do the right thing, even when no one is watching.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="file" /></div><h3>Transparency</h3><p>Plain language, upfront costs, no surprises.</p></div>
            <div class="card"><div class="icon green"><x-icon name="handshake" /></div><h3>Partnership</h3><p>Your goals drive every recommendation we make.</p></div>
            <div class="card"><div class="icon"><x-icon name="leaf" /></div><h3>Growth</h3><p>We aim for outcomes that help you grow long term.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta cta-photo" style="--cta-img:url('{{ asset('images/photos/houses.jpg') }}')">
            <h2>Let's talk about your goals</h2>
            <p>Our team is ready to help you with your next step.</p>
            <div class="actions"><a class="btn btn-gold" href="{{ route('contact') }}">Get in Touch</a></div>
        </div>
    </div>
</section>
@endsection
