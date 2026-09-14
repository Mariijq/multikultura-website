<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login | Multikultura</title>

    @vite([
        'resources/css/app.css',
        'resources/css/login.css',
        'resources/js/app.js',
    ])
</head>

<body>

<main class="login-page">

    <section class="login-card">

        {{-- LEFT SIDE IMAGE --}}
        <div class="login-image">

            <img src="{{ asset('images/images.jpg') }}"
                alt="Multikultura">            

        </div>


        {{-- RIGHT SIDE LOGIN --}}
        <div class="login-content">

            <div class="login-form-wrapper">

                <h1>Admin Login</h1>

                <p class="login-subtitle">
                    Log in to access the administration dashboard.
                </p>


                <x-auth-session-status
                    class="login-status"
                    :status="session('status')"
                />


                <form method="POST"
                      action="{{ route('login') }}"
                      class="login-form">

                    @csrf


                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label for="email">
                            Email address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
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


                    {{-- PASSWORD --}}
                    <div class="form-group">

                        <div class="label-row">

                            <label for="password">
                                Password
                            </label>

                            @if (Route::has('password.request'))

                                <a href="{{ route('password.request') }}"
                                   class="forgot-password">

                                    Forgot password?

                                </a>

                            @endif

                        </div>


                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="login-error"
                        />

                    </div>


                    {{-- REMEMBER --}}
                    <label class="remember-me">

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>Remember me</span>

                    </label>


                    <button type="submit"
                            class="login-button">

                        Log in

                    </button>

                </form>

            </div>

        </div>

    </section>

</main>

</body>
</html>