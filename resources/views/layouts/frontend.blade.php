<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Multikultura')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    @vite([
        'resources/css/app.css',
        'resources/css/frontend.css',
        'resources/js/app.js',
        'resources/js/frontend.js'
    ])

    @stack('styles')
</head>

<body>

<header class="frontend-header">

    <nav class="frontend-navbar">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="frontend-logo">
            <img
                src="{{ asset('images/images.jpg') }}"
                alt="Multikultura"
            >
        </a>

        {{-- Navigation --}}
        <div class="frontend-navigation">

            {{-- Languages --}}
        <div class="frontend-languages">
            <a href="{{ route('switch.lang', 'en') }}"
            class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"
            title="English">
                <span class="fi fi-us"></span>
            </a>

            <a href="{{ route('switch.lang', 'mk') }}"
            class="{{ app()->getLocale() === 'mk' ? 'active' : '' }}"
            title="Macedonian">
                <span class="fi fi-mk"></span>
            </a>

            <a href="{{ route('switch.lang', 'al') }}"
            class="{{ app()->getLocale() === 'al' ? 'active' : '' }}"
            title="Albanian">
                <span class="fi fi-al"></span>
            </a>
        </div>
            {{-- Menu --}}
            <div class="frontend-nav-links">
                <a href="#">About Us</a>
                <a href="#">Projects</a>
                <a href="#">Publications</a>
                <a href="#">News & Media</a>
                <a href="#">Contact</a>
            </div>

        </div>

    </nav>

</header>

<main class="frontend-main">
    @yield('content')
</main>

<footer class="frontend-footer">
    <p>© {{ date('Y') }} Multikultura. All rights reserved.</p>
</footer>

@stack('scripts')

</body>

</html>