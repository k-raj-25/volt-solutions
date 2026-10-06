@extends('admin.layout')
@section('title', 'Message')

@section('content')
<header>
    <h1>Message from {{ $message->name }}</h1>
    <a class="btn btn-outline btn-sm" href="{{ route('admin.messages.index') }}">Back</a>
</header>
<div class="box" style="max-width:720px">
    <p><strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
    @if ($message->phone)<p><strong>Phone:</strong> {{ $message->phone }}</p>@endif
    <p><strong>Interest:</strong> {{ $message->interest ?? '—' }}</p>
    <p><strong>Received:</strong> {{ $message->created_at->format('d M Y, h:i A') }}</p>
    <hr style="border:0;border-top:1px solid var(--line);margin:18px 0">
    <p style="white-space:pre-wrap">{{ $message->message }}</p>
    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </form>
</div>
@endsection
