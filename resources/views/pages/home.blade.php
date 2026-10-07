@extends('layouts.app')

@section('title', 'Volt Solutions – Business Funding & Real Estate, Gurugram | Your Financial Fortress')
@section('description', 'Bridge funding, instant unsecured funding and secured private funding for businesses, plus real estate services, from Volt Solutions in Gurugram.')

@section('content')
<section class="hero">
    <div class="container">
        <div class="hero-top">
            <h1>Business funding, <em>done fast.</em></h1>
            <div>
                <p class="lead">Bridge, instant unsecured and secured private funding for established businesses, plus real estate advice, from one team in Gurugram.</p>
                <div class="actions">
                    <a href="{{ route('loans') }}" class="btn btn-primary">Explore funding</a>
                    <a href="{{ route('real-estate') }}" class="btn btn-outline">View real estate</a>
                </div>
            </div>
        </div>
        <div class="hero-banner">
            <img src="{{ asset('images/photos/villa-night.jpg') }}" alt="Elegant home lit at dusk">
            <div class="float-stats">
                <div class="float-stat"><strong>30 days</strong><span>Bridge funding</span></div>
                <div class="float-stat"><strong>4 months</strong><span>Instant unsecured</span></div>
                <div class="float-stat"><strong>5 years</strong><span>Secured, up to</span></div>
            </div>
        </div>
    </div>
    <div class="marquee" aria-hidden="true">
        <div class="marquee-track">
            @for ($i = 0; $i < 2; $i++)
                <span>Bridge funding</span><span>Instant unsecured funding</span><span>Secured private funding</span><span>Buy property</span><span>Sell property</span><span>Rentals</span><span>Commercial space</span>
            @endfor
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">What we do</span>
            <h2>Two services. One trusted partner.</h2>
        </div>
        <div class="bento">
            <article class="tile tile-a">
                <img src="{{ asset('images/photos/coins.jpg') }}" alt="Stacks of coins showing financial growth" loading="lazy">
                <span class="pill">Business funding</span>
                <h3>Funding that fits your plans.</h3>
                <p>Bridge, instant unsecured and secured private funding for businesses, with clear terms and a real person beside you.</p>
                <a class="btn" href="{{ route('loans') }}">Explore funding</a>
            </article>
            <article class="tile tile-b">
                <img src="{{ asset('images/photos/keys.jpg') }}" alt="Handing over the keys to a new home" loading="lazy">
                <span class="pill">Real estate</span>
                <h3>Find the place. Own the moment.</h3>
                <p>Buy, sell or rent with verified listings and honest advice.</p>
                <a class="btn" href="{{ route('real-estate') }}">View properties</a>
            </article>
        </div>
    </div>
</section>

<section class="section soft" id="services">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Our services · Business funding</span>
            <h2>Funding built around your business</h2>
        </div>
        <div class="grid-3">
            <div class="card"><div class="icon gold"><x-icon name="clock" /></div><h3>Bridge Funding</h3><p>An unsecured business loan for up to 30 days, to cover short gaps in cash flow.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="cash" /></div><h3>Instant Unsecured Funding</h3><p>An unsecured business loan for 4 months, with no collateral to arrange.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="shield" /></div><h3>Secured Private Funding</h3><p>Larger funding against security, for 6 months to 5 years.</p></div>
        </div>
        <p style="margin-top:36px"><a class="btn btn-primary" href="{{ route('loans') }}">See funding details</a></p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Our services · Real estate</span>
            <h2>Find, sell or rent with confidence</h2>
        </div>
        <div class="grid-3">
            <div class="card"><div class="icon green"><x-icon name="home" /></div><h3>Buy Property</h3><p>Residential plots, apartments and houses matched to your budget.</p></div>
            <div class="card"><div class="icon green"><x-icon name="chart" /></div><h3>Sell Property</h3><p>Pricing guidance, marketing and buyer coordination.</p></div>
            <div class="card"><div class="icon green"><x-icon name="key" /></div><h3>Rentals</h3><p>Residential and commercial rentals with verified owners and tenants.</p></div>
            <div class="card"><div class="icon green"><x-icon name="building" /></div><h3>Commercial Space</h3><p>Shops, offices and warehouses for your business.</p></div>
            <div class="card"><div class="icon green"><x-icon name="file" /></div><h3>Legal &amp; Documentation</h3><p>Title checks and paperwork support for a smooth transaction.</p></div>
            <div class="card"><div class="icon green"><x-icon name="cash" /></div><h3>Property Financing</h3><p>Pair your purchase with the right funding from our funding desk.</p></div>
        </div>
        <p style="margin-top:36px"><a class="btn btn-green" href="{{ route('real-estate') }}">Explore real estate</a></p>
    </div></section>

<section class="section soft">
    <div class="container split">
        <div class="photo-stack">
            <img class="photo" src="{{ asset('images/photos/houses.jpg') }}" alt="Modern apartment buildings in warm sunlight" loading="lazy">
            <div class="photo-badge"><strong>Funding + Property</strong><span>One trusted team</span></div>
        </div>
        <div>
            <span class="eyebrow">Your partner</span>
            <h2>Finance the dream. Find the place.</h2>
            <p class="lead">Most people deal with a lender in one place and a property agent in another. With us, one team handles both so nothing gets lost in between.</p>
            <ul class="checklist">
                <li>Funding eligibility checked before you shortlist properties</li>
                <li>Verified listings and documentation support</li>
                <li>One point of contact from enquiry to handover</li>
            </ul>
            <a class="btn btn-primary" href="{{ route('about') }}">More about us</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Why Volt Solutions</span>
            <h2>Built like a fortress. Run like a friend.</h2>
        </div>
        <div class="num-list">
            <div class="num-item"><small>01</small><h3>Secure &amp; transparent</h3><p>No hidden charges. Every term explained before you sign.</p></div>
            <div class="num-item"><small>02</small><h3>Fast processing</h3><p>Streamlined paperwork and quick turnaround on approvals.</p></div>
            <div class="num-item"><small>03</small><h3>Personal guidance</h3><p>A dedicated advisor who understands your goals.</p></div>
            <div class="num-item"><small>04</small><h3>Growth focused</h3><p>Solutions designed to help you grow, not just borrow.</p></div>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">How it works</span>
            <h2>Four steps. No runaround.</h2>
        </div>
        <div class="steps">
            <div class="step"><h3>Tell us your goal</h3><p>Share what you need through a quick call or form.</p></div>
            <div class="step"><h3>Get expert advice</h3><p>We recommend the best-fit funding or property options.</p></div>
            <div class="step"><h3>Submit documents</h3><p>We help you prepare and verify everything.</p></div>
            <div class="step"><h3>Move forward</h3><p>Funds disbursed or keys handed over, with support after.</p></div>
        </div>
    </div>
</section>

@if ($posts->count())
<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">From the blog</span>
            <h2>Insights &amp; guides.</h2>
        </div>
        <div class="grid-3">
            @foreach ($posts as $post)
                @include('partials.post-card', ['post' => $post])
            @endforeach
        </div>
        <p style="margin-top:40px"><a class="btn btn-outline" href="{{ route('blog.index') }}">Read all articles</a></p>
    </div>
</section>
@endif

<section class="section" style="padding-top:0">
    <div class="container">
        <div class="cta cta-photo" style="--cta-img:url('{{ asset('images/photos/city.jpg') }}')">
            <h2>Ready for the next step?</h2>
            <p>Talk to our team today. We will help you find the right funding or the right property.</p>
            <div class="actions">
                <a class="btn btn-gold" href="{{ route('contact') }}">Contact us</a>
                @if (config('site.phone'))<a class="btn btn-outline" href="tel:{{ preg_replace('/\s+/', '', config('site.phone')) }}">Call {{ config('site.phone') }}</a>@endif
            </div>
        </div>
    </div>
</section>
@endsection
