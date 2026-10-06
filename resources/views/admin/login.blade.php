<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login – Volt Solutions</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body class="admin-body">
<div class="login-wrap">
    <div class="box login-box">
        <img src="{{ asset('images/logo.png') }}" alt="Volt Solutions">
        <h1 style="font-size:1.4rem;text-align:center;margin-bottom:20px">Admin sign in</h1>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </div>
            <label style="display:flex;gap:8px;align-items:center;margin-bottom:18px;font-size:.9rem"><input type="checkbox" name="remember" value="1"> Remember me</label>
            <button class="btn btn-primary" style="width:100%;justify-content:center" type="submit">Sign in</button>
        </form>
    </div>
</div>
</body>
</html>
