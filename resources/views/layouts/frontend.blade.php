
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Multikultura')
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
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

    {{-- HEADER --}}

    <header class="frontend-header">

        <nav class="frontend-navbar">

            {{-- Logo --}}

            <a
                href="{{ route('home') }}"
                class="frontend-logo"
            >
                <img
                    src="{{ asset('images/images.jpg') }}"
                    alt="Multikultura"
                >
            </a>


            {{-- Hamburger button: visible on tablet/mobile --}}

            <button
                type="button"
                class="frontend-menu-toggle"
                id="frontend-menu-toggle"
                aria-label="Open navigation menu"
                aria-expanded="false"
                aria-controls="frontend-navigation"
            >
                <i class="bx bx-menu"></i>
            </button>


            {{-- Sidebar overlay --}}

            <div
                class="frontend-menu-overlay"
                id="frontend-menu-overlay"
            ></div>


            {{-- Navigation sidebar --}}

            <div
                class="frontend-navigation"
                id="frontend-navigation"
            >

                {{-- Close sidebar button --}}

                <button
                    type="button"
                    class="frontend-menu-close"
                    id="frontend-menu-close"
                    aria-label="Close navigation menu"
                >
                    <i class="bx bx-x"></i>
                </button>


                {{-- Search and languages --}}

                <div class="frontend-languages">

                    {{-- Search form --}}

                    <div
                        class="frontend-search"
                        id="frontendSearch"
                    >
                        <form action="#" method="GET">

                            <input
                                type="text"
                                name="search"
                                placeholder="Search..."
                                autocomplete="off"
                                aria-label="Search"
                            >

                        </form>
                    </div>


                    {{-- Search toggle button --}}

                    <button
                        type="button"
                        class="frontend-search-button"
                        id="searchToggle"
                        aria-label="Toggle search"
                    >
                        <i class="bx bx-search"></i>
                    </button>


                    {{-- English --}}

                    <a
                        href="{{ route('switch.lang', 'en') }}"
                        class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"
                        title="English"
                        aria-label="English"
                    >
                        <span class="fi fi-us"></span>
                    </a>


                    {{-- Macedonian --}}

                    <a
                        href="{{ route('switch.lang', 'mk') }}"
                        class="{{ app()->getLocale() === 'mk' ? 'active' : '' }}"
                        title="Macedonian"
                        aria-label="Macedonian"
                    >
                        <span class="fi fi-mk"></span>
                    </a>


                    {{-- Albanian --}}

                    <a
                        href="{{ route('switch.lang', 'al') }}"
                        class="{{ app()->getLocale() === 'al' ? 'active' : '' }}"
                        title="Albanian"
                        aria-label="Albanian"
                    >
                        <span class="fi fi-al"></span>
                    </a>

                </div>


                {{-- Main navigation links --}}

                <div class="frontend-nav-links">

                    <a href="{{ route('frontend.about-us') }}">
                        {{ __('frontend.about_us') }}
                    </a>

                    <a href="{{ route('frontend.all-projects') }}">
                        {{ __('frontend.projects') }}
                    </a>

                    <a href="{{ route('frontend.all-publications') }}">
                        {{ __('frontend.publications') }}
                    </a>

                    <a href="{{ route('frontend.all-partners') }}">
                        {{ __('frontend.partners') }}
                    </a>
                    <a href="{{ route('frontend.all-news') }}">
                        {{ __('frontend.news_media') }}
                    </a>

                    <a href="{{ route('frontend.contact') }}">
                        {{ __('frontend.contact') }}
                    </a>

                </div>

            </div>

        </nav>

    </header>


    {{-- MAIN CONTENT --}}

    <main class="frontend-main">

        @yield('content')

    </main>


    {{-- CONTACT FOOTER --}}

    @php
        $contact = $contact ?? \App\Models\Contact::first();
    @endphp

    <section class="frontend-contact-footer">

        <div class="frontend-contact-container">

            <h2>
                {{ __('frontend.contact') }}
            </h2>


            @if($contact)

                <div class="frontend-contact-info">

                    {{-- Address --}}

                    <div class="contact-item">

                        <i class="bx bx-map"></i>

                        <span>
                            {{ $contact->address[app()->getLocale()] ?? $contact->address['en'] ?? '' }}
                        </span>

                    </div>


                    {{-- Email --}}

                    @if($contact->email)

                        <div class="contact-item">

                            <i class="bx bx-envelope"></i>

                            <span>
                                {{ $contact->email }}
                            </span>

                        </div>

                    @endif


                    {{-- Phone --}}

                    @if($contact->phone)

                        <div class="contact-item">

                            <i class="bx bx-phone"></i>

                            <span>
                                {{ $contact->phone }}
                            </span>

                        </div>

                    @endif

                </div>


                {{-- Social media --}}

                <div class="frontend-social-media">

                    @if($contact->facebook)

                        <a
                            href="{{ $contact->facebook }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                        >
                            <i class="bx bxl-facebook"></i>
                        </a>

                    @endif


                    @if($contact->instagram)

                        <a
                            href="{{ $contact->instagram }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                        >
                            <i class="bx bxl-instagram"></i>
                        </a>

                    @endif


                    @if($contact->linkedin)

                        <a
                            href="{{ $contact->linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn"
                        >
                            <i class="bx bxl-linkedin"></i>
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </section>


    <hr>


    {{-- MAIN FOOTER --}}

    <footer class="frontend-footer">

        <p>
            © {{ date('Y') }} Multikultura. All rights reserved.
        </p>

    </footer>


    {{-- Additional page scripts --}}

    @stack('scripts')

</body>

</html>
