<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password | Multikultura</title>

    @vite([
        'resources/css/app.css',
        'resources/css/login.css',
        'resources/js/app.js',
    ])
</head>

<body>
<main class="login-page">
    <section class="login-card">

        <div class="login-image">
            <img src="{{ asset('images/images.jpg') }}" alt="Multikultura">
        </div>

        <div class="login-content">
            <div class="login-form-wrapper">

                <h1>Reset Password</h1>

                <p class="login-subtitle">
                    Enter your new password below.
                </p>

                <x-auth-session-status class="login-status" :status="session('status')" />

                <form method="POST" action="{{ route('password.store') }}" class="login-form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="email">Email address</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="admin@example.com"
                        >

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="login-error"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password">New password</label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Enter your new password"
                        >

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="login-error"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm password</label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your new password"
                        >

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="login-error"
                        />
                    </div>

                    <button type="submit" class="login-button">
                        Reset Password
                    </button>

                    <div class="forgot-password-back">
                        <a href="{{ route('login') }}">
                            ← Back to Login
                        </a>
                    </div>
                </form>

            </div>
        </div>

    </section>
</main>
</body>
</html>