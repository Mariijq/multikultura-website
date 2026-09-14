@extends('layouts.admin')

@section('title', 'About Us | Multikultura')

@push('styles')
    @vite('resources/css/admindashboard.css')
    <x-rich-text::styles />
@endpush

@push('scripts')
    @vite('resources/js/dashboard.js')
@endpush

@section('content')

<div class="head-title">
    <div class="left">
        <h1>About Us</h1>

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
                <span class="text">About Us</span>
            </li>
        </ul>
    </div>
</div>

<div class="about-container">

    <div class="language-tabs">

        <button type="button" class="language-tab active" data-language="en">
            <span class="language-flag">🇬🇧</span>
            <span>English</span>
        </button>

        <button type="button" class="language-tab" data-language="mk">
            <span class="language-flag">🇲🇰</span>
            <span>Македонски</span>
        </button>

        <button type="button" class="language-tab" data-language="al">
            <span class="language-flag">🇦🇱</span>
            <span>Shqip</span>
        </button>

    </div>

    <form method="POST" action="#">
        @csrf

        <div class="language-content active" id="language-en">

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Who We Are</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="who_we_are_en"
                    id="who_we_are_en"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>What We Offer</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="what_we_offer_en"
                    id="what_we_offer_en"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Vision</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="vision_en"
                    id="vision_en"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Mission</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="mission_en"
                    id="mission_en"
                />
            </div>

        </div>

        <div class="language-content" id="language-mk">

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Кои сме ние</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="who_we_are_mk"
                    id="who_we_are_mk"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Што нудиме</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="what_we_offer_mk"
                    id="what_we_offer_mk"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Визија</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="vision_mk"
                    id="vision_mk"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Мисија</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="mission_mk"
                    id="mission_mk"
                />
            </div>

        </div>

        <div class="language-content" id="language-al">

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Kush jemi ne</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="who_we_are_al"
                    id="who_we_are_al"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Çfarë ofrojmë</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="what_we_offer_al"
                    id="what_we_offer_al"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Vizioni</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="vision_al"
                    id="vision_al"
                />
            </div>

            <div class="about-card">
                <div class="about-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Misioni</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="mission_al"
                    id="mission_al"
                />
            </div>

        </div>

        <div class="about-actions">
            <button type="submit" class="save-button">
                <i class='bx bx-save'></i>
                Save Changes
            </button>
        </div>

    </form>

</div>

@endsection

