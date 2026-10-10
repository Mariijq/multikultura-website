@extends('layouts.admin')

@section('title', 'Contact | Multikultura')

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Contact</h1>

        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
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

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Language tabs --}}
    <div class="language-tabs">
        <button
            type="button"
            class="language-tab active"
            data-language="en"
        >
            <span>English</span>
        </button>

        <button
            type="button"
            class="language-tab"
            data-language="mk"
        >
            <span>Македонски</span>
        </button>

        <button
            type="button"
            class="language-tab"
            data-language="al"
        >
            <span>Shqip</span>
        </button>
    </div>

    <form
        method="POST"
        action="{{ route('admin.contact.update') }}"
    >
        @csrf

        {{-- ==================== ENGLISH ADDRESS ==================== --}}

        <div
            class="language-content active"
            id="language-en"
        >
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Address</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address_en">Address (English)</label>

                    <input
                        type="text"
                        name="address_en"
                        id="address_en"
                        value="{{ old('address_en', $contact?->address['en'] ?? '') }}"
                        class="form-control"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- ==================== MACEDONIAN ADDRESS ==================== --}}

        <div
            class="language-content"
            id="language-mk"
        >
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Адреса</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address_mk">Address (Macedonian)</label>

                    <input
                        type="text"
                        name="address_mk"
                        id="address_mk"
                        value="{{ old('address_mk', $contact?->address['mk'] ?? '') }}"
                        class="form-control"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- ==================== ALBANIAN ADDRESS ==================== --}}

        <div
            class="language-content"
            id="language-al"
        >
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Adresa</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address_al">Address (Albanian)</label>

                    <input
                        type="text"
                        name="address_al"
                        id="address_al"
                        value="{{ old('address_al', $contact?->address['al'] ?? '') }}"
                        class="form-control"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- ==================== CONTACT INFORMATION ==================== --}}

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <h2>Contact Information</h2>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $contact?->email ?? '') }}"
                    class="form-control"
                >
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>

                <input
                    type="text"
                    name="phone"
                    id="phone"
                    value="{{ old('phone', $contact?->phone ?? '') }}"
                    class="form-control"
                >
            </div>
        </div>

        {{-- ==================== SOCIAL MEDIA ==================== --}}

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <h2>Social Media</h2>
                </div>
            </div>

            <div class="form-group">
                <label for="facebook">Facebook URL</label>

                <input
                    type="url"
                    name="facebook"
                    id="facebook"
                    value="{{ old('facebook', $contact?->facebook ?? '') }}"
                    class="form-control"
                    placeholder="https://facebook.com/..."
                >
            </div>

            <div class="form-group">
                <label for="instagram">Instagram URL</label>

                <input
                    type="url"
                    name="instagram"
                    id="instagram"
                    value="{{ old('instagram', $contact?->instagram ?? '') }}"
                    class="form-control"
                    placeholder="https://instagram.com/..."
                >
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn URL</label>

                <input
                    type="url"
                    name="linkedin"
                    id="linkedin"
                    value="{{ old('linkedin', $contact?->linkedin ?? '') }}"
                    class="form-control"
                    placeholder="https://linkedin.com/..."
                >
            </div>
        </div>

        {{-- ==================== GOOGLE MAPS ==================== --}}

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <h2>Google Maps</h2>
                </div>
            </div>

            <div class="form-group">
                <label for="google_maps_link">Google Maps Embed URL or iframe</label>

                <textarea
                    name="google_maps_link"
                    id="google_maps_link"
                    class="form-control"
                    rows="5"
                    placeholder="Paste the Google Maps embed URL or complete iframe code"
                >{{ old('google_maps_link', $contact?->google_maps_link ?? '') }}</textarea>

                <small class="form-text">
                    Open Google Maps, select Share, choose Embed a map,
                    and paste the iframe code or its embed URL here.
                </small>

                <div
                    id="map-preview-container"
                    style="display: none; margin-top: 20px;"
                >
                    <label>Map Preview</label>

                    <div
                        style="
                            width: 100%;
                            height: 350px;
                            overflow: hidden;
                            border-radius: 8px;
                        "
                    >
                        <iframe
                            id="map-preview"
                            src=""
                            width="100%"
                            height="350"
                            style="border: 0;"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                            title="Google Maps Preview"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>

        {{-- ==================== SAVE ==================== --}}

        <div class="actions">
            <button
                type="submit"
                class="save-button"
            >
                <i class='bx bx-save'></i>
                <span>Save Changes</span>
            </button>
        </div>

    </form>
</div>

{{-- ==================== JAVASCRIPT ==================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Language tabs
    const languageTabs = document.querySelectorAll('.language-tab');
    const languageContents = document.querySelectorAll('.language-content');

    languageTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            const language = this.dataset.language;

            languageTabs.forEach(function (item) {
                item.classList.remove('active');
            });

            languageContents.forEach(function (content) {
                content.classList.remove('active');
            });

            this.classList.add('active');

            const activeContent = document.getElementById(
                'language-' + language
            );

            if (activeContent) {
                activeContent.classList.add('active');
            }
        });
    });

    // Google Maps preview
    const input = document.getElementById('google_maps_link');
    const preview = document.getElementById('map-preview');
    const container = document.getElementById('map-preview-container');

    if (!input || !preview || !container) {
        return;
    }

    function updateMapPreview() {
        const value = input.value.trim();

        if (!value) {
            preview.src = '';
            container.style.display = 'none';
            return;
        }

        let url = value;

        // Extract the iframe src if a complete iframe was pasted.
        const match = value.match(
            /<iframe\b[^>]*\bsrc\s*=\s*["']([^"']+)["']/i
        );

        if (match) {
            url = match[1];

            // Decode HTML entities that may appear in the iframe URL.
            url = url
                .replace(/&amp;/gi, '&')
                .replace(/&#0*38;/gi, '&');
        }

        try {
            const parsedUrl = new URL(url);

            const valid =
                parsedUrl.protocol === 'https:' &&
                [
                    'www.google.com',
                    'google.com'
                ].includes(parsedUrl.hostname.toLowerCase()) &&
                parsedUrl.pathname.startsWith('/maps/embed');

            if (valid) {
                preview.src = parsedUrl.href;
                container.style.display = 'block';
                return;
            }
        } catch (error) {
            // The entered URL is invalid.
        }

        preview.src = '';
        container.style.display = 'none';
    }

    input.addEventListener('input', updateMapPreview);

    // Show the preview for a previously saved URL.
    updateMapPreview();
});
</script>

@endsection
