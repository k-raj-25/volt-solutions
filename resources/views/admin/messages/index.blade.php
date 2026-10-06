@extends('admin.layout')
@section('title', 'Messages')

@section('content')
<header><h1>Contact messages</h1></header>
<div class="box">
    <div class="table-wrap">
        <table>
            <thead><tr><th>From</th><th>Interest</th><th>Message</th><th>Received</th><th></th></tr></thead>
            <tbody>
            @forelse ($messages as $m)
                <tr>
                    <td>@if (! $m->is_read)<span class="badge" style="margin:0 6px 0 0">New</span>@endif<strong>{{ $m->name }}</strong><br><small>{{ $m->email }}</small></td>
                    <td>{{ $m->interest }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($m->message, 70) }}</td>
                    <td>{{ $m->created_at->diffForHumans() }}</td>
                    <td><a class="btn btn-outline btn-sm" href="{{ route('admin.messages.show', $m) }}">Open</a></td>
                </tr>
            @empty
                <tr><td colspan="5">No messages yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $messages->links('partials.pagination') }}
</div>
@endsection
