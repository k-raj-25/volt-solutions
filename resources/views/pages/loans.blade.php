@extends('layouts.app')

@section('title', 'Business & Home Loans – Bridge, Instant & Secured Funding | Volt Solutions')
@section('description', 'Bridge funding for 7 to 30 days, instant funding for 4 to 6 months and secured funding from 1 year up to 5–10 years. No CIBIL score needed for these; bank and NBFC business and home loans need one. Pan India.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Funding',
    'title' => 'Business <em>funding.</em>',
    'lead' => 'Fast, clear funding for business loans and home loans, Pan India. No CIBIL score needed for bridge, instant, secured or private funding, and every term explained upfront.',
    'facts' => [['Products', 'Bridge, Instant, Secured'], ['Terms', '7 days up to 10 years'], ['For', 'Business and home loans'], ['Coverage', 'Pan India'], ['CIBIL', 'Only for bank and NBFC loans']],
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
            <div class="card"><div class="icon gold"><x-icon name="clock" /></div><span class="term">7 to 30 days</span><h3>Bridge Funding</h3><p>Short-term funding to cover a gap in cash flow, for 7 to 30 days.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="cash" /></div><span class="term">4 to 6 months</span><h3>Instant Funding</h3><p>Quick unsecured funding for 4 to 6 months, with no collateral to arrange.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="shield" /></div><span class="term">1 year up to 5–10 years</span><h3>Secured Funding</h3><p>Larger funding against security, from 1 year up to 5–10 years.</p></div>
        </div>
        <div style="margin-top:20px">@include('partials.funding-highlights')</div>
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Eligibility</span>
            <h2>Who can apply</h2>
            <p class="lead">For business loans, the minimum turnover depends on where your business is based.</p>
        </div>
        <div class="grid-2">
            <div class="card"><div class="icon gold"><x-icon name="pin" /></div><h3>Delhi NCR</h3><p><strong>Turnover of {{ config('site.currency') }}2 crore</strong> or more.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="building" /></div><h3>Outside Delhi NCR</h3><p><strong>Turnover of {{ config('site.currency') }}100 crore</strong> or more.</p></div>
        </div>
        <div class="section-head" style="margin-top:56px">
            <h2>When a CIBIL score is needed</h2>
        </div>
        <div class="grid-2">
            <div class="card"><div class="icon gold"><x-icon name="building" /></div><h3>CIBIL score needed</h3><p><strong>Business loans and home loans</strong> through banks and NBFCs.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="shield" /></div><h3>No CIBIL score needed</h3><p><strong>Bridge, instant, secured and private funding.</strong></p></div>
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
            <details><summary>What is the difference between the three products?</summary><p>Bridge funding is short-term funding for 7 to 30 days. Instant funding is unsecured and runs for 4 to 6 months. Secured funding is backed by security and runs from 1 year up to 5–10 years.</p></details>
            <details><summary>Do I need a CIBIL score?</summary><p>It depends on the product. Business loans and home loans through banks and NBFCs need a CIBIL score. Bridge, instant, secured and private funding do not.</p></details>
            <details><summary>Do you lend outside Delhi NCR?</summary><p>Yes. We fund business loans and home loans Pan India.</p></details>
            <details><summary>Can I get a home loan, or only a business loan?</summary><p>Both. We offer business loans and home loans.</p></details>
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
