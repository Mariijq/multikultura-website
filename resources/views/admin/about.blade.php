@extends('layouts.admin')

@section('title', 'Contact Us | Multikultura')

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Contact Us</h1>

        <ul class="breadcrumb">
            <li>
                <span class="text">Dashboard</span>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <span class="text">Contact Us</span>
            </li>
        </ul>
    </div>
</div>

<div class="dashboard-container">

    <div class="language-tabs">
        <button type="button" class="language-tab active" data-language="en">
            <span>English</span>
        </button>

        <button type="button" class="language-tab" data-language="mk">
            <span>Македонски</span>
        </button>

        <button type="button" class="language-tab" data-language="al">
            <span>Shqip</span>
        </button>
    </div>

    <form method="POST" action="{{ route('admin.contact.update') }}">
        @csrf

        {{-- Address --}}

        <div class="language-content active" id="language-en">

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Address</h2>
                    </div>
                </div>

                <input
                    type="text"
                    name="address_en"
                    value="{{ old('address_en', $contact?->address['en'] ?? '') }}"
                    class="form-control"
                >
            </div>

        </div>

        <div class="language-content" id="language-mk">

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Адреса</h2>
                    </div>
                </div>

                <input
                    type="text"
                    name="address_mk"
                    value="{{ old('address_mk', $contact?->address['mk'] ?? '') }}"
                    class="form-control"
                >
            </div>

        </div>

        <div class="language-content" id="language-al">

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Adresa</h2>
                    </div>
                </div>

                <input
                    type="text"
                    name="address_al"
                    value="{{ old('address_al', $contact?->address['al'] ?? '') }}"
                    class="form-control"
                >
            </div>

        </div>

        {{-- Contact information --}}

        <div class="dashboard-card">

            <div class="dashboard-card-header">
                <div>
                    <h2>Contact Information</h2>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $contact?->email ?? '') }}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>

                <input
                    type="text"
                    name="phone"
                    id="phone"
                    value="{{ old('phone', $contact?->phone ?? '') }}"
                    class="form-control"
                >
            </div>

        </div>

        {{-- Social media --}}

        <div class="dashboard-card">

            <div class="dashboard-card-header">
                <div>
                    <h2>Social Media</h2>
                </div>
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>

                <input
                    type="url"
                    name="facebook"
                    id="facebook"
                    value="{{ old('facebook', $contact?->facebook ?? '') }}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>

                <input
                    type="url"
                    name="instagram"
                    id="instagram"
                    value="{{ old('instagram', $contact?->instagram ?? '') }}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn</label>

                <input
                    type="url"
                    name="linkedin"
                    id="linkedin"
                    value="{{ old('linkedin', $contact?->linkedin ?? '') }}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="google_maps_link">Google Maps</label>

                <input
                    type="url"
                    name="google_maps_link"
                    id="google_maps_link"
                    value="{{ old('google_maps_link', $contact?->google_maps_link ?? '') }}"
                    class="form-control"
                >
            </div>

        </div>

        <div class="actions">
            <button type="submit" class="save-button">
                <i class='bx bx-save'></i>
                Save Changes
            </button>
        </div>

    </form>

</div>

@endsection