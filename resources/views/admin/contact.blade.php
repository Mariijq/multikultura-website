@extends('layouts.admin')

@section('title', 'Contact | Multikultura')

@push('styles')
<x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Contact</h1>

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
            <span class="text">Contact</span>
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

    {{-- ==================== ENGLISH ==================== --}}

    <div class="language-content active" id="language-en">

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>Email</h2>
                </div>
            </div>

            <input
                type="email"
                name="email_en"
                value="{{ old('email_en', $contact?->email['en'] ?? '') }}"
                class="form-control"
            >
        </div>

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

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>Phone</h2>
                </div>
            </div>

            <input
                type="text"
                name="phone_en"
                value="{{ old('phone_en', $contact?->phone['en'] ?? '') }}"
                class="form-control"
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>Facebook</h2>
                </div>
            </div>

            <input
                type="url"
                name="facebook_en"
                value="{{ old('facebook_en', $contact?->facebook['en'] ?? '') }}"
                class="form-control"
                placeholder="https://facebook.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>Instagram</h2>
                </div>
            </div>

            <input
                type="url"
                name="instagram_en"
                value="{{ old('instagram_en', $contact?->instagram['en'] ?? '') }}"
                class="form-control"
                placeholder="https://instagram.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>LinkedIn</h2>
                </div>
            </div>

            <input
                type="url"
                name="linkedin_en"
                value="{{ old('linkedin_en', $contact?->linkedin['en'] ?? '') }}"
                class="form-control"
                placeholder="https://linkedin.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>YouTube</h2>
                </div>
            </div>

            <input
                type="url"
                name="youtube_en"
                value="{{ old('youtube_en', $contact?->youtube['en'] ?? '') }}"
                class="form-control"
                placeholder="https://youtube.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>Google Maps Link</h2>
                </div>
            </div>

            <input
                type="url"
                name="google_maps_link_en"
                value="{{ old('google_maps_link_en', $contact?->google_maps_link['en'] ?? '') }}"
                class="form-control"
                placeholder="Paste Google Maps link"
            >
        </div>

    </div>


    {{-- ==================== MACEDONIAN ==================== --}}

    <div class="language-content" id="language-mk">

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>Е-пошта</h2>
                </div>
            </div>

            <input
                type="email"
                name="email_mk"
                value="{{ old('email_mk', $contact?->email['mk'] ?? '') }}"
                class="form-control"
            >
        </div>

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

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>Телефон</h2>
                </div>
            </div>

            <input
                type="text"
                name="phone_mk"
                value="{{ old('phone_mk', $contact?->phone['mk'] ?? '') }}"
                class="form-control"
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>Facebook</h2>
                </div>
            </div>

            <input
                type="url"
                name="facebook_mk"
                value="{{ old('facebook_mk', $contact?->facebook['mk'] ?? '') }}"
                class="form-control"
                placeholder="https://facebook.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>Instagram</h2>
                </div>
            </div>

            <input
                type="url"
                name="instagram_mk"
                value="{{ old('instagram_mk', $contact?->instagram['mk'] ?? '') }}"
                class="form-control"
                placeholder="https://instagram.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>LinkedIn</h2>
                </div>
            </div>

            <input
                type="url"
                name="linkedin_mk"
                value="{{ old('linkedin_mk', $contact?->linkedin['mk'] ?? '') }}"
                class="form-control"
                placeholder="https://linkedin.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>YouTube</h2>
                </div>
            </div>

            <input
                type="url"
                name="youtube_mk"
                value="{{ old('youtube_mk', $contact?->youtube['mk'] ?? '') }}"
                class="form-control"
                placeholder="https://youtube.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>Google Maps линк</h2>
                </div>
            </div>

            <input
                type="url"
                name="google_maps_link_mk"
                value="{{ old('google_maps_link_mk', $contact?->google_maps_link['mk'] ?? '') }}"
                class="form-control"
                placeholder="Paste Google Maps link"
            >
        </div>

    </div>


    {{-- ==================== ALBANIAN ==================== --}}

    <div class="language-content" id="language-al">

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>Email</h2>
                </div>
            </div>

            <input
                type="email"
                name="email_al"
                value="{{ old('email_al', $contact?->email['al'] ?? '') }}"
                class="form-control"
            >
        </div>

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

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>Telefoni</h2>
                </div>
            </div>

            <input
                type="text"
                name="phone_al"
                value="{{ old('phone_al', $contact?->phone['al'] ?? '') }}"
                class="form-control"
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>Facebook</h2>
                </div>
            </div>

            <input
                type="url"
                name="facebook_al"
                value="{{ old('facebook_al', $contact?->facebook['al'] ?? '') }}"
                class="form-control"
                placeholder="https://facebook.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>Instagram</h2>
                </div>
            </div>

            <input
                type="url"
                name="instagram_al"
                value="{{ old('instagram_al', $contact?->instagram['al'] ?? '') }}"
                class="form-control"
                placeholder="https://instagram.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>LinkedIn</h2>
                </div>
            </div>

            <input
                type="url"
                name="linkedin_al"
                value="{{ old('linkedin_al', $contact?->linkedin['al'] ?? '') }}"
                class="form-control"
                placeholder="https://linkedin.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>YouTube</h2>
                </div>
            </div>

            <input
                type="url"
                name="youtube_al"
                value="{{ old('youtube_al', $contact?->youtube['al'] ?? '') }}"
                class="form-control"
                placeholder="https://youtube.com/..."
            >
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>Lidhja e Google Maps</h2>
                </div>
            </div>

            <input
                type="url"
                name="google_maps_link_al"
                value="{{ old('google_maps_link_al', $contact?->google_maps_link['al'] ?? '') }}"
                class="form-control"
                placeholder="Paste Google Maps link"
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
