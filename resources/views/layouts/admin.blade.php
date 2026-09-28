<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel | Multikultura')</title>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @vite([
        'resources/css/app.css',
        'resources/css/admindashboard.css',
        'resources/js/app.js',
        'resources/js/dashboard.js'
    ])

    @stack('styles')
</head>

<body>

<section id="sidebar">

    <ul class="side-menu top">
        <li>
            <a href="{{ route('admin.about') }}">
                <i class='bx bx-info-circle bx-sm'></i>
                <span class="text">About Us</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.news.index') }}">
                <i class='bx bx-news bx-sm'></i>
                <span class="text">News</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.projects.index') }}">
                <i class='bx bx-folder bx-sm'></i>
                <span class="text">Projects</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.publications.index') }}">
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
            <a href="{{ route('admin.contact') }}">
                <i class='bx bx-envelope bx-sm'></i>
                <span class="text">Contact</span>
            </a>
        </li>

    </ul>

    <ul class="side-menu">

        <li>
            <a href="{{ route('admin.settings') }}">
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
@if (session('success'))
    <script>
        toastr.success(@json(session('success')));
    </script>
@endif

@if (session('error'))
    <script>
        toastr.error(@json(session('error')));
    </script>
@endif

@if (session('warning'))
    <script>
        toastr.warning(@json(session('warning')));
    </script>
@endif

@if (session('info'))
    <script>
        toastr.info(@json(session('info')));
    </script>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}", "Validation Error");
        </script>
    @endforeach
@endif

</body>
</html>
