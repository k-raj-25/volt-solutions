@extends('layouts.app')

@section('title', 'Contact Us – Volt Solutions')
@section('description', 'Contact Volt Solutions for loan or real estate enquiries. Call, email or send us a message.')

@section('content')
<section class="contact-page">
    <div class="container contact-layout">
        <div class="contact-intro">
            <div class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Contact</div>
            <h1>Say <em>hello.</em></h1>
            <p class="lead">Loan question? Looking for a property? Drop us a line and a real person will reply within one working day.</p>

            <div class="contact-lines">
                <a href="tel:{{ preg_replace('/\s+/', '', config('site.phone')) }}">
                    <small>Call</small>
                    <span>{{ config('site.phone') }}</span>
                    <i aria-hidden="true">↗</i>
                </a>
                <a href="mailto:{{ config('site.email') }}">
                    <small>Email</small>
                    <span>{{ config('site.email') }}</span>
                    <i aria-hidden="true">↗</i>
                </a>
                <div>
                    <small>Visit</small>
                    <span>{{ config('site.address') }}</span>
                </div>
                <div>
                    <small>Hours</small>
                    <span>{{ config('site.hours') }}</span>
                </div>
            </div>
        </div>

        <div class="contact-card">
            <div class="contact-card-photo" style="--img:url('{{ asset('images/photos/keys.jpg') }}')">
                <span class="tag-white">Free first consultation</span>
            </div>
            <div class="contact-card-body">
                <h2>Send us a message</h2>
                @if (session('success'))
                    <div class="alert alert-success" role="status">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                    <div class="interest-pick">
                        <span>I'm interested in</span>
                        @foreach (['Loans', 'Real Estate', 'Other'] as $opt)
                            <label>
                                <input type="radio" name="interest" value="{{ $opt }}" @checked(old('interest', request('interest', 'Loans')) === $opt)>
                                <b>{{ $opt }}</b>
                            </label>
                        @endforeach
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="name">Full name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="field">
                            <label for="phone">Phone (optional)</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')<div class="error">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<div class="error">{{ $message }}</div>@enderror
                    </div>
                    <div class="field">
                        <label for="message">How can we help?</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                        @error('message')<div class="error">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-primary" type="submit" style="width:100%">Send message</button>
                    <p class="form-note">Your details stay private. We never share them without your consent.</p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
