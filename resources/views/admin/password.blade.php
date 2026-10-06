@extends('admin.layout')
@section('title', 'Change password')

@section('content')
<header><h1>Change password</h1></header>
<div class="box" style="max-width:480px">
    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf @method('PUT')
        <div class="field">
            <label for="current_password">Current password</label>
            <input type="password" id="current_password" name="current_password" required autocomplete="current-password">
            @error('current_password')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="field">
            <label for="password">New password (min 10 characters)</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">
            @error('password')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="field">
            <label for="password_confirmation">Confirm new password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button class="btn btn-primary" type="submit">Update password</button>
    </form>
</div>
@endsection
