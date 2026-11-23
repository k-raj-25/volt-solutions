@extends('layouts.app')

@section('title', 'Volt Solutions – Business Loans & Home Loans, Pan India | Your Financial Fortress')
@section('description', 'Bridge, instant and secured funding for business loans and home loans, Pan India, with no CIBIL score needed. From Volt Solutions, Gurugram.')

@section('content')
<section class="hero">
    <div class="container">
        <div class="hero-top">
            <h1>Business funding, <em>done fast.</em></h1>
            <div>
                <p class="lead">Bridge, instant and secured funding for business and home loans, Pan India, with no CIBIL score needed. From one team in Gurugram.</p>
                <div class="actions">
                    <a href="{{ route('loans') }}" class="btn btn-primary">Explore funding</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline">Talk to us</a>
                </div>
            </div>
        </div>
        <div class="hero-banner">
            <img src="{{ asset('images/photos/villa-night.jpg') }}" alt="Elegant home lit at dusk">
            <div class="float-stats">
                <div class="float-stat"><strong>7–30 days</strong><span>Bridge funding</span></div>
                <div class="float-stat"><strong>4–6 months</strong><span>Instant funding</span></div>
                <div class="float-stat"><strong>1–10 years</strong><span>Secured funding</span></div>
            </div>
        </div>
    </div>
    <div class="marquee" aria-hidden="true">
        <div class="marquee-track">
            @for ($i = 0; $i < 2; $i++)
                <span>Bridge funding</span><span>Instant funding</span><span>Secured funding</span><span>No CIBIL score needed</span><span>Pan India</span><span>Business loans</span><span>Home loans</span>
            @endfor
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">What we do</span>
            <h2>Business loans and home loans.</h2>
        </div>
        <div class="bento">
            <article class="tile tile-a">
                <img src="{{ asset('images/photos/coins.jpg') }}" alt="Stacks of coins showing financial growth" loading="lazy">
                <span class="pill">Business loans</span>
                <h3>Funding that fits your plans.</h3>
                <p>Bridge, instant and secured funding for your business, Pan India, with no CIBIL score needed.</p>
                <a class="btn" href="{{ route('loans') }}">Explore funding</a>
            </article>
            <article class="tile tile-b">
                <img src="{{ asset('images/photos/keys.jpg') }}" alt="Handing over the keys to a new home" loading="lazy">
                <span class="pill">Home loans</span>
                <h3>Get the keys sooner.</h3>
                <p>Funding for your home, with clear terms and no CIBIL score needed.</p>
                <a class="btn" href="{{ route('loans') }}">Explore home loans</a>
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
            <div class="card"><div class="icon gold"><x-icon name="clock" /></div><span class="term">7 to 30 days</span><h3>Bridge Funding</h3><p>Short-term funding to cover a gap in cash flow, for 7 to 30 days.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="cash" /></div><span class="term">4 to 6 months</span><h3>Instant Funding</h3><p>Quick unsecured funding for 4 to 6 months, with no collateral to arrange.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="shield" /></div><span class="term">1 year up to 5–10 years</span><h3>Secured Funding</h3><p>Larger funding against security, from 1 year up to 5–10 years.</p></div>
        </div>
        <div style="margin-top:20px">@include('partials.funding-highlights')</div>
        <p style="margin-top:36px"><a class="btn btn-primary" href="{{ route('loans') }}">See funding details</a></p>
    </div>
</section>

<section class="section soft">
    <div class="container split">
        <div class="photo-stack">
            <img class="photo" src="{{ asset('images/photos/houses.jpg') }}" alt="Modern apartment buildings in warm sunlight" loading="lazy">
            <div class="photo-badge"><strong>No CIBIL score needed</strong><span>Pan India</span></div>
        </div>
        <div>
            <span class="eyebrow">Your partner</span>
            <h2>Funding with a real person beside you.</h2>
            <p class="lead">One dedicated advisor takes you from first call to disbursal, for business loans and home loans alike.</p>
            <ul class="checklist">
                <li>Eligibility checked quickly, with no CIBIL score needed</li>
                <li>Help preparing your documents</li>
                <li>One point of contact from enquiry to disbursal</li>
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
            <div class="step"><h3>Get expert advice</h3><p>We recommend the best-fit funding option.</p></div>
            <div class="step"><h3>Submit documents</h3><p>We help you prepare and verify everything.</p></div>
            <div class="step"><h3>Move forward</h3><p>Funds disbursed, with support after.</p></div>
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
            <p>Talk to our team today. We will help you find the right funding.</p>
            <div class="actions">
                <a class="btn btn-gold" href="{{ route('contact') }}">Contact us</a>
                @if (config('site.phone'))<a class="btn btn-outline" href="tel:{{ preg_replace('/\s+/', '', config('site.phone')) }}">Call {{ config('site.phone') }}</a>@endif
            </div>
        </div>
    </div>
</section>
@endsection
