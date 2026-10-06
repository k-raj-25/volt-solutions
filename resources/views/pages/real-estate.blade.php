@extends('layouts.app')

@section('title', 'Real Estate – Buy, Sell, Rent | Volt Solutions')
@section('description', 'Buy, sell or rent residential and commercial property with Volt Solutions. Verified listings, honest advice and financing support.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Real Estate',
    'title' => 'Real <em>estate.</em>',
    'lead' => 'Find the right property, backed by a team that can also help you finance it.',
    'facts' => [['Services', 'Buy, sell and rent'], ['Types', 'Residential and commercial'], ['Extra', 'Home loan assistance']],
    'image' => 'keys',
    'alt' => 'Handing over the keys to a new home',
    'tag' => 'Verified listings',
])

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Our Property Services</span>
            <h2>Everything you need, in one place</h2>
        </div>
        <div class="grid-3">
            <div class="card"><div class="icon green"><x-icon name="home" /></div><h3>Residential</h3><p>Apartments, villas, independent houses and plots.</p></div>
            <div class="card"><div class="icon green"><x-icon name="building" /></div><h3>Commercial</h3><p>Offices, retail shops, showrooms and warehouses.</p></div>
            <div class="card"><div class="icon green"><x-icon name="key" /></div><h3>Rentals &amp; Leasing</h3><p>Matching owners and tenants with transparent agreements.</p></div>
            <div class="card"><div class="icon green"><x-icon name="chart" /></div><h3>Property Valuation</h3><p>Realistic price guidance based on location and market trends.</p></div>
            <div class="card"><div class="icon green"><x-icon name="file" /></div><h3>Documentation</h3><p>Title verification, agreements and registration support.</p></div>
            <div class="card"><div class="icon green"><x-icon name="cash" /></div><h3>Home Loan Assistance</h3><p>Arrange property financing through our loan desk.</p></div>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container split">
        <div class="panel green panel-photo" style="--panel-img:url('{{ asset('images/photos/keys.jpg') }}')">
            <h2>Buying? Selling? Renting?</h2>
            <p>Tell us what you are looking for and we will shortlist options that match your budget, location and timeline.</p>
            <p><a class="btn btn-gold" href="{{ route('contact') }}">Talk to a Property Advisor</a></p>
        </div>
        <div>
            <span class="eyebrow">Why Choose Us</span>
            <h2>Property advice you can trust</h2>
            <ul class="checklist">
                <li>Verified listings and documents</li>
                <li>Honest pricing with no pressure</li>
                <li>Loan and property help from one team</li>
                <li>Support through registration and handover</li>
            </ul>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Property Types</span>
            <h2>Homes for every lifestyle</h2>
        </div>
        <div class="gallery">
            <figure><img class="photo" src="{{ asset('images/photos/gate-villa.jpg') }}" alt="Classic villa behind a gated driveway" loading="lazy"><figcaption>Independent houses &amp; villas</figcaption></figure>
            <figure><img class="photo" src="{{ asset('images/photos/houses.jpg') }}" alt="Modern apartment buildings" loading="lazy"><figcaption>Apartments &amp; flats</figcaption></figure>
            <figure><img class="photo" src="{{ asset('images/photos/villa-night.jpg') }}" alt="Premium home with pool at dusk" loading="lazy"><figcaption>Premium residences</figcaption></figure>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Process</span>
            <h2>How we help you</h2>
        </div>
        <div class="steps">
            <div class="step"><h3>Requirement</h3><p>We understand your needs and budget.</p></div>
            <div class="step"><h3>Shortlist</h3><p>You get curated, verified options.</p></div>
            <div class="step"><h3>Site visit &amp; checks</h3><p>We arrange visits and verify papers.</p></div>
            <div class="step"><h3>Close the deal</h3><p>Financing, registration and handover.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta cta-photo" style="--cta-img:url('{{ asset('images/photos/gate-villa.jpg') }}')">
            <h2>Start your property journey</h2>
            <p>Share your requirement and we will get back to you shortly.</p>
            <div class="actions"><a class="btn btn-gold" href="{{ route('contact') }}">Send an Enquiry</a></div>
        </div>
    </div>
</section>
@endsection
