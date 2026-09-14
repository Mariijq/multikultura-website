<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel | Multikultura')</title>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/css/admindashboard.css',
        'resources/js/app.js',
        'resources/js/admindashboard.js'
    ])

    @stack('styles')
</head>

<body>

<section id="sidebar">

    <a href="{{ route('admin.dashboard') }}" class="brand">
        <img src="{{ asset('images/images.jpg') }}" alt="Multikultura">
    </a>

    <ul class="side-menu top">

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard bx-sm'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.about') }}">
                <i class='bx bx-info-circle bx-sm'></i>
                <span class="text">About Us</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-news bx-sm'></i>
                <span class="text">News</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-folder bx-sm'></i>
                <span class="text">Projects</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-book bx-sm'></i>
                <span class="text">Publications</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-message-rounded-dots bx-sm'></i>
                <span class="text">Messages</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-envelope bx-sm'></i>
                <span class="text">Contact</span>
            </a>
        </li>

    </ul>

    <ul class="side-menu">

        <li>
            <a href="#">
                <i class='bx bxs-cog bx-sm'></i>
                <span class="text">Settings</span>
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout">
                    <i class='bx bx-power-off bx-sm'></i>
                    <span class="text">Logout</span>
                </button>
            </form>
        </li>

    </ul>

</section>

<section id="content">

    <nav>

        <i class='bx bx-menu bx-sm'></i>

        <span class="nav-title">
            Admin Panel
        </span>

        <form action="#">
            <div class="form-input">

                <input type="search" placeholder="Search...">

                <button type="submit" class="search-btn">
                    <i class='bx bx-search'></i>
                </button>

            </div>
        </form>

        <input type="checkbox" id="switch-mode" hidden>

        <label for="switch-mode" class="switch-mode"></label>

        <a href="#" class="notification">
            <i class='bx bxs-bell bx-sm'></i>
            <span class="num">3</span>
        </a>

        <a href="#" class="profile">
            <img src="{{ asset('images/images.jpg') }}" alt="Profile">
        </a>

    </nav>

    <main>

        @yield('content')

    </main>

</section>

@stack('scripts')

</body>
</html>
