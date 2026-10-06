@extends('layouts.app')

@section('title', 'Financial Loans – Personal, Business, Home | Volt Solutions')
@section('description', 'Compare loan options, estimate your EMI and apply with Volt Solutions. Transparent terms and fast processing.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Loans',
    'title' => 'Financial <em>loans.</em>',
    'lead' => 'Straightforward loans with clear terms, so you always know what you are signing up for.',
    'facts' => [['Types', 'Personal, business, home, vehicle'], ['Tools', 'Free EMI calculator'], ['Reply', 'Within one working day']],
    'image' => 'coins',
    'alt' => 'Stacks of coins showing financial growth',
    'tag' => 'Clear terms, no surprises',
])

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Loan Types</span>
            <h2>Choose the loan that fits</h2>
        </div>
        <div class="grid-3">
            <div class="card"><div class="icon gold"><x-icon name="user" /></div><h3>Personal Loan</h3><p>Unsecured funds for personal needs with simple documentation.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="briefcase" /></div><h3>Business Loan</h3><p>Working capital, equipment finance and expansion funding.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="home" /></div><h3>Home Loan</h3><p>Long-tenure loans to buy, construct or renovate a home.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="car" /></div><h3>Vehicle Loan</h3><p>Finance for cars, bikes and commercial vehicles.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="graduation" /></div><h3>Education Loan</h3><p>Fund higher studies with flexible repayment options.</p></div>
            <div class="card"><div class="icon gold"><x-icon name="building" /></div><h3>Loan Against Property</h3><p>Higher loan amounts using your property as security.</p></div>
        </div>
    </div>
</section>

<section class="section soft">
    <div class="container split">
        <div>
            <span class="eyebrow">EMI Calculator</span>
            <h2>Plan your monthly payments</h2>
            <p class="lead">Move the sliders to estimate your monthly instalment. This is an estimate only; your final offer depends on eligibility and the lender.</p>
            <ul class="checklist">
                <li>Compare different amounts and tenures instantly</li>
                <li>See total interest before you commit</li>
            </ul>
        </div>
        <form class="calc" id="emi-calc" onsubmit="return false">
            <label>Loan amount ({{ config('site.currency') }}) <output data-out="amount"></output></label>
            <input type="range" name="amount" min="50000" max="10000000" step="50000" value="1000000" aria-label="Loan amount">
            <label>Interest rate (p.a.) <output data-out="rate"></output></label>
            <input type="range" name="rate" min="6" max="24" step="0.1" value="10.5" aria-label="Interest rate">
            <label>Tenure <output data-out="years"></output></label>
            <input type="range" name="years" min="1" max="30" step="1" value="10" aria-label="Tenure in years">
            <div class="calc-result">
                <div><strong>{{ config('site.currency') }}<span data-res="emi"></span></strong><span>Monthly EMI</span></div>
                <div><strong>{{ config('site.currency') }}<span data-res="interest"></span></strong><span>Total interest</span></div>
                <div><strong>{{ config('site.currency') }}<span data-res="total"></span></strong><span>Total payable</span></div>
            </div>
        </form>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <span class="eyebrow">Transparent From Day One</span>
            <h2>Clear terms, handled in person</h2>
            <p class="lead">Every loan is explained face to face before you sign: the amount, the interest, the fees and the repayment schedule.</p>
            <ul class="checklist">
                <li>No hidden charges</li>
                <li>Dedicated loan advisor</li>
                <li>Flexible repayment options</li>
            </ul>
            <a class="btn btn-primary" href="{{ route('contact') }}">Talk to our loan desk</a>
        </div>
        <img class="photo" src="{{ asset('images/photos/money-handover.jpg') }}" alt="Handing over cash across a desk during a loan meeting" loading="lazy">
    </div>
</section>

<section class="section soft">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Process</span>
            <h2>From enquiry to disbursal</h2>
        </div>
        <div class="steps">
            <div class="step"><h3>Enquire</h3><p>Tell us the amount and purpose.</p></div>
            <div class="step"><h3>Eligibility check</h3><p>We review your profile and suggest options.</p></div>
            <div class="step"><h3>Documents</h3><p>Submit ID, income and address proofs.</p></div>
            <div class="step"><h3>Approval &amp; disbursal</h3><p>Sign the agreement and receive funds.</p></div>
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
            <details><summary>What documents do I need?</summary><p>Typically identity proof, address proof, income proof (salary slips or ITR) and recent bank statements. Business loans may need additional business documents.</p></details>
            <details><summary>How long does approval take?</summary><p>Many applications are assessed within a few working days once all documents are complete. Timelines vary by loan type.</p></details>
            <details><summary>Does my credit score matter?</summary><p>Yes. A healthy credit score improves your chances and may help you get a better rate. We can guide you on improving it.</p></details>
            <details><summary>Are there any hidden charges?</summary><p>No. We explain processing fees, prepayment terms and other charges upfront, before you commit.</p></details>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta cta-photo" style="--cta-img:url('{{ asset('images/photos/coins.jpg') }}')">
            <h2>Apply or ask a question</h2>
            <p>Our loan desk will get back to you within one working day.</p>
            <div class="actions"><a class="btn btn-gold" href="{{ route('contact') }}">Enquire About a Loan</a></div>
        </div>
    </div>
</section>
@endsection
