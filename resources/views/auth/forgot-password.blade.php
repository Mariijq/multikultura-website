<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Forgot Password | Multikultura</title>

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

        <img
            src="{{ asset('images/images.jpg') }}"
            alt="Multikultura"
        >

    </div>


    {{-- RIGHT SIDE FORM --}}
    <div class="login-content">

        <div class="login-form-wrapper">

            <h1>Forgot Password?</h1>

            <p class="login-subtitle">
                Enter your email address and we will send you a link to reset your password.
            </p>


            <x-auth-session-status
                class="login-status"
                :status="session('status')"
            />


            <form method="POST"
                  action="{{ route('password.email') }}"
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
                        autocomplete="email"
                        placeholder="admin@example.com"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="login-error"
                    />

                </div>


                {{-- BUTTON --}}
                <button type="submit"
                        class="login-button">

                    Email Password Reset Link

                </button>


                {{-- BACK TO LOGIN --}}
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
