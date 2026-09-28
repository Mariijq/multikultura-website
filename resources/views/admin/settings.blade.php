@extends('layouts.admin')

@section('title', 'Settings | Multikultura')

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Settings</h1>

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
                <span class="text">Settings</span>
            </li>
        </ul>
    </div>
</div>

<div class="dashboard-container">

    {{-- Account --}}

    <div class="dashboard-card">

        <div class="dashboard-card-header">
            <div>
                <span class="section-label">Account</span>
                <h2>Account Information</h2>
            </div>
        </div>

        @if (session('account_status'))
            <div class="alert alert-success">
                {{ session('account_status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.account.update') }}">
            @csrf

            <div class="form-group">

                <label for="name">
                    Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', auth()->user()->name) }}"
                    class="form-control"
                    required
                >

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">

                <label for="account_email">
                    Email Address
                </label>

                <input
                    id="account_email"
                    type="email"
                    name="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    class="form-control"
                    required
                >

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="actions">

                <button type="submit" class="save-button">
                    <i class='bx bx-save'></i>
                    Save Changes
                </button>

            </div>

        </form>

    </div>


    {{-- Security --}}

    <div class="dashboard-card">

        <div class="dashboard-card-header">
            <div>
                <span class="section-label">Security</span>
                <h2>Change Password</h2>
            </div>
        </div>

        @if (session('password_status'))
            <div class="alert alert-success">
                {{ session('password_status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.password.update') }}">
            @csrf

            <div class="form-group">

                <label for="current_password">
                    Current Password
                </label>

                <input
                    id="current_password"
                    type="password"
                    name="current_password"
                    class="form-control"
                    required
                    autocomplete="current-password"
                >

                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">

                <label for="new_password">
                    New Password
                </label>

                <input
                    id="new_password"
                    type="password"
                    name="password"
                    class="form-control"
                    required
                    autocomplete="new-password"
                >

                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">

                <label for="password_confirmation">
                    Confirm New Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required
                    autocomplete="new-password"
                >

            </div>

            <div class="actions">

                <button type="submit" class="save-button">
                    <i class='bx bx-lock-alt'></i>
                    Change Password
                </button>

            </div>

        </form>

    </div>


    {{-- Password Reset Email --}}

    <div class="dashboard-card">

        <div class="dashboard-card-header">
            <div>
                <span class="section-label">Security</span>
                <h2>Password Recovery</h2>
            </div>
        </div>

        <p>
            If you cannot remember your current password, you can request a password reset link by email.
        </p>

        @if (session('reset_status'))
            <div class="alert alert-success">
                {{ session('reset_status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.reset-password') }}">
            @csrf

            <div class="form-group">

                <label for="reset_email">
                    Email Address
                </label>

                <input
                    id="reset_email"
                    type="email"
                    name="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    class="form-control"
                    required
                    autocomplete="email"
                >

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="actions">

                <button type="submit" class="save-button">
                    <i class='bx bx-envelope'></i>
                    Send Password Reset Link
                </button>

            </div>

        </form>

    </div>

    {{-- Language --}}

    <div class="dashboard-card">

        <div class="dashboard-card-header">
            <div>
                <span class="section-label">Language</span>
                <h2>Admin Language</h2>
            </div>
        </div>

        @if (session('language_status'))
            <div class="alert alert-success">
                {{ session('language_status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.language.update') }}">
            @csrf

            <div class="form-group">

                <label for="preferred_language">
                    Language
                </label>

                <select id="preferred_language" name="preferred_language" class="form-control">

                    <option
                        value="en"
                        {{ auth()->user()->preferred_language === 'en' ? 'selected' : '' }}
                    >
                        English
                    </option>

                    <option
                        value="mk"
                        {{ auth()->user()->preferred_language === 'mk' ? 'selected' : '' }}
                    >
                        Македонски
                    </option>

                    <option
                        value="sq"
                        {{ auth()->user()->preferred_language === 'sq' ? 'selected' : '' }}
                    >
                        Shqip
                    </option>

                </select>

            </div>

            <div class="actions">

                <button type="submit" class="save-button">
                    <i class='bx bx-globe'></i>
                    Save Language
                </button>

            </div>

        </form>

    </div>

</div>

@endsection