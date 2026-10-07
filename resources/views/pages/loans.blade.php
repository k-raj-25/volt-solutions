@extends('layouts.app')

@section('title', 'Business Funding – Bridge, Unsecured & Secured | Volt Solutions')
@section('description', 'Bridge funding up to 30 days, instant unsecured funding for 4 months and secured private funding for 6 months to 5 years. Volt Solutions, Gurugram.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Funding',
    'title' => 'Business <em>funding.</em>',
    'lead' => 'Fast, clear funding for established businesses. Unsecured or secured, short or long, with terms explained upfront.',
    'facts' => [['Products', 'Bridge, Instant Unsecured, Secured Private'], ['Terms', '30 days to 5 years'], ['Eligibility', 'Business turnover based']],
    'image' => 'coins',
    'alt' => 'Stacks of coins showing financial growth',
    'tag' => 'Clear terms, no surprises',
])

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Our Products</span>
            <h2>Choose the funding that fits</h2>
        </div>
        <div class="grid-3">
            <div class="card"><div class="icon gold"><x-icon name="clock" /></div><h3>Bridge Funding</h3><p>An unsecured business loan for up to 30 days, to bridge a short gap in cash flow.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="cash" /></div><h3>Instant Unsecured Funding</h3><p>An unsecured business loan for 4 months. No collateral to arrange.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="shield" /></div><h3>Secured Private Funding</h3><p>Private funding against security, for 6 months to 5 years.</p></div>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Eligibility</span>
            <h2>Who can apply</h2>
            <p class="lead">Our funding is for established businesses. The minimum turnover depends on where your business is based.</p>
        </div>
        <div class="grid-2">
            <div class="card"><div class="icon gold"><x-icon name="pin" /></div><h3>Delhi NCR</h3><p><strong>Turnover of {{ config('site.currency') }}2 crore</strong> or more.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="building" /></div><h3>Outside Delhi NCR</h3><p><strong>Turnover of {{ config('site.currency') }}100 crore</strong> or more.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <span class="eyebrow">Transparent From Day One</span>
            <h2>Clear terms, explained upfront</h2>
            <p class="lead">Every offer is explained before you sign: the amount, the cost, the fees and the repayment schedule.</p>
            <ul class="checklist">
                <li>No hidden charges</li>
                <li>Dedicated funding advisor</li>
                <li>Flexible repayment options</li>
            </ul>
            <a class="btn btn-primary" href="{{ route('contact') }}">Talk to our funding desk</a>
        </div>
        <img class="photo" src="{{ asset('images/photos/money-handover.jpg') }}" alt="Handing over cash across a desk during a funding meeting" loading="lazy">
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Process</span>
            <h2>From enquiry to funds</h2>
        </div>
        <div class="steps">
            <div class="step"><h3>Enquire</h3><p>Tell us the amount, term and purpose.</p></div>
            <div class="step"><h3>Eligibility check</h3><p>We review your profile and suggest options.</p></div>
            <div class="step"><h3>Documents</h3><p>Submit your business and KYC documents.</p></div>
            <div class="step"><h3>Approval &amp; disbursal</h3><p>Sign the agreement and receive the funds.</p></div>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container" style="max-width:820px">
        <div class="section-head">
            <span class="eyebrow">FAQ</span>
            <h2>Common questions</h2>
        </div>
        <div class="faq">
            <details><summary>What is the difference between the three products?</summary><p>Bridge funding is an unsecured business loan for up to 30 days. Instant unsecured funding is an unsecured business loan for 4 months. Secured private funding is backed by security and runs from 6 months to 5 years.</p></details>
            <details><summary>What turnover do I need?</summary><p>A business turnover of {{ config('site.currency') }}2 crore or more if you are in Delhi NCR, and {{ config('site.currency') }}100 crore or more if you are outside Delhi NCR.</p></details>
            <details><summary>What documents do I need?</summary><p>Typically business and KYC documents, financial statements and recent bank statements. Our team will confirm the exact list for your case.</p></details>
            <details><summary>Are there any hidden charges?</summary><p>No. We explain fees and other charges upfront, before you commit.</p></details>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta cta-photo" style="--cta-img:url('{{ asset('images/photos/coins.jpg') }}')">
            <h2>Apply or ask a question</h2>
            <p>Our funding desk will get back to you within one working day.</p>
            <div class="actions"><a class="btn btn-gold" href="{{ route('contact') }}">Enquire About Funding</a></div>
        </div>
    </div>
</section>
@endsection
