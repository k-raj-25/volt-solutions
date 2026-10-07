@extends('layouts.app')

@section('title', 'Terms & Conditions – Volt Solutions')
@section('description', 'Terms and conditions for using the Volt Solutions website and services.')

@section('content')
@include('partials.page-hero', [
    'crumb' => 'Terms & Conditions',
    'title' => 'Terms & <em>conditions.</em>',
    'lead' => 'The rules for using our website and services.',
])

<section class="section">
    <div class="container legal">
        <p>By using this website you agree to the following terms. Please read them carefully.</p>

        <h2>1. Use of the website</h2>
        <p>The content on this site is for general information only. You agree to use the website lawfully and not to misuse or disrupt it.</p>

        <h2>2. Business funding</h2>
        <p>Information about funding products on this site is indicative and does not constitute an offer. Approval, pricing, fees and terms depend on eligibility, documentation and the credit assessment of the funding partner.</p>

        <h2>3. Real estate</h2>
        <p>Property details, prices and availability may change without notice. Visitors should independently verify property documents, title and approvals before any transaction.</p>

        <h2>4. Eligibility</h2>
        <p>Turnover requirements shown on this site are minimum criteria only. Meeting them does not guarantee approval.</p>

        <h2>5. Intellectual property</h2>
        <p>All content, logos and design on this website belong to Volt Solutions and may not be copied or reused without permission.</p>

        <h2>6. Limitation of liability</h2>
        <p>To the extent permitted by law, Volt Solutions is not liable for losses arising from reliance on information on this website.</p>

        <h2>7. Governing law</h2>
        <p>These terms are governed by the laws applicable in the jurisdiction where Volt Solutions is registered.</p>

        <h2>8. Contact</h2>
        <p>Questions about these terms can be sent to <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>.</p>

        <p class="notice">This is a template. The client should review it with a qualified legal adviser, and add regulatory registration and licence details, before publishing.</p>
    </div>
</section>
@endsection
