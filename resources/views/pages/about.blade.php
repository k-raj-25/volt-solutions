@extends('layouts.app')

@section('title', 'About Us – Volt Solutions')
@section('description', 'Learn about Volt Solutions: our story, mission and the values behind our business loans and home loans.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'About',
    'title' => 'About <em>us.</em>',
    'lead' => 'We help businesses and homebuyers secure fast, clear funding, Pan India.',
    'facts' => [['Focus', 'Business loans and home loans'], ['Approach', 'Transparent and personal'], ['Promise', 'Your financial fortress']],
    'image' => 'city',
    'alt' => 'Aerial view of a busy city',
    'tag' => 'Clear terms, no surprises',
])

<section class="section">
    <div class="container split">
        <div>
            <span class="eyebrow">Our Story</span>
            <h2>Built to be your financial fortress</h2>
            <p>Volt Solutions began with a simple belief: financial decisions should feel safe, not stressful. We saw that people needing quick funding were often met with slow processes, unclear terms and strict credit score checks.</p>
            <p>So we built something better. Today we offer bridge, instant and secured funding for business loans and home loans across India, with a team that takes the time to understand your situation.</p>
            <ul class="checklist">
                <li>Clear, honest advice with no hidden charges</li>
                <li>No CIBIL score needed for bridge, instant, secured and private funding</li>
                <li>Support from first enquiry to disbursal</li>
            </ul>
        </div>
        <div class="panel navy panel-photo" style="--panel-img:url('{{ asset('images/photos/villa-night.jpg') }}')">
            <h3>Our Mission</h3>
            <p>To make borrowing accessible, transparent and secure for every client we serve.</p>
            <h3 style="margin-top:24px">Our Vision</h3>
            <p style="margin-bottom:0">To be the most trusted name in business and home funding in the communities we serve.</p>
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
