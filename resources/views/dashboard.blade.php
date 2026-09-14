<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Multikultura</title>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/css/admindashboard.css',
        'resources/js/app.js',
        'resources/js/admindashboard.js'
    ])
</head>

<body>

<section id="sidebar">

    <a href="{{ route('admin.dashboard') }}" class="brand">
        <img src="{{ asset('images/images.jpg') }}" alt="Multikultura">
    </a>

    <ul class="side-menu top">

        <li class="active">
            <a href="{{ route('dashboard') }}">
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

        <span class="nav-title">Admin Panel</span>

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

        <div class="head-title">

            <div class="left">

                <h1>Dashboard</h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>

                    <li>
                        <span class="text">Admin Panel</span>
                    </li>
                </ul>

            </div>

        </div>


        <ul class="box-info">

            <li>
                <i class='bx bx-news'></i>

                <span class="text">
                    <h3>0</h3>
                    <p>News</p>
                </span>
            </li>

            <li>
                <i class='bx bx-folder'></i>

                <span class="text">
                    <h3>0</h3>
                    <p>Projects</p>
                </span>
            </li>

            <li>
                <i class='bx bx-book'></i>

                <span class="text">
                    <h3>0</h3>
                    <p>Publications</p>
                </span>
            </li>

            <li>
                <i class='bx bx-message-rounded-dots'></i>

                <span class="text">
                    <h3>0</h3>
                    <p>New Messages</p>
                </span>
            </li>

        </ul>


        <div class="table-data">

            <div class="order">

                <div class="head">
                    <h3>Recent News</h3>

                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>

                <table>

                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>
                                <span class="text">No news available</span>
                            </td>

                            <td>-</td>

                            <td>
                                <span class="status pending">
                                    Empty
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>


            <div class="todo">

                <div class="head">
                    <h3>Quick Actions</h3>

                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>

                <ul class="todo-list">

                    <li class="not-completed">
                        <p>Add News</p>
                        <i class='bx bx-right-arrow-alt'></i>
                    </li>

                    <li class="not-completed">
                        <p>Add Project</p>
                        <i class='bx bx-right-arrow-alt'></i>
                    </li>

                    <li class="not-completed">
                        <p>Add Publication</p>
                        <i class='bx bx-right-arrow-alt'></i>
                    </li>

                    <li class="not-completed">
                        <p>View Messages</p>
                        <i class='bx bx-right-arrow-alt'></i>
                    </li>

                </ul>

            </div>

        </div>

    </main>

</section>

</body>
</html>