@extends('layouts.app')

@section('title', 'Careers – Join Volt Solutions')
@section('description', 'Build your career with Volt Solutions. Explore opportunities in loans, real estate and customer support.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Careers',
    'title' => 'Join the <em>team.</em>',
    'lead' => 'Join a team that helps people secure their financial future.',
    'facts' => [['Roles', 'Loan executive, property advisor, support'], ['Apply', 'Email your resume to us']],
    'image' => 'villa-night',
    'alt' => 'Elegant home lit at dusk',
    'tag' => 'We\'re hiring',
])

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Why Join Us</span>
            <h2>Grow with us</h2>
        </div>
        <div class="grid-3">
            <div class="card"><div class="icon"><x-icon name="chart" /></div><h3>Learning &amp; Growth</h3><p>Training and clear progression paths across loans and real estate.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="handshake" /></div><h3>Supportive Team</h3><p>A collaborative culture where your ideas are heard.</p></div>
            <div class="card"><div class="icon green"><x-icon name="shield" /></div><h3>Purpose-Driven Work</h3><p>Help real people make important financial decisions.</p></div>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container" style="max-width:820px">
        <div class="section-head">
            <span class="eyebrow">Open Roles</span>
            <h2>Current openings</h2>
        </div>
        <div class="card" style="margin-bottom:16px"><h3>Loan Relationship Executive</h3><p>Guide customers through loan options and documentation.</p></div>
        <div class="card" style="margin-bottom:16px"><h3>Real Estate Advisor</h3><p>Connect buyers, sellers and tenants with the right properties.</p></div>
        <div class="card"><h3>Customer Support Associate</h3><p>Be the friendly first point of contact for our clients.</p></div>
        <p class="center" style="margin-top:32px">Interested? Email your resume to <a href="mailto:{{ config('site.email') }}"><strong>{{ config('site.email') }}</strong></a> or <a href="{{ route('contact') }}">send us a message</a>.</p>
    </div>
</section>
@endsection
