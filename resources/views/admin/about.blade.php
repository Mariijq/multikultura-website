@extends('layouts.admin')

@section('title', 'About Us | Multikultura')

@push('styles')
    <x-rich-text::styles />
@endpush


@section('content')

<div class="head-title">
    <div class="left">
        <h1>About Us</h1>

        <ul class="breadcrumb">
            <li>
                <a href="#">
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

    <form method="POST" action="{{ route('admin.about.update') }}">
        @csrf

        <div class="language-content active" id="language-en">

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Who We Are</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="who_we_are_en"
                    id="who_we_are_en"
                    :value="old('who_we_are_en', $about?->who_we_are['en'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>What We Offer</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="what_we_offer_en"
                    id="what_we_offer_en"
                    :value="old('what_we_offer_en', $about?->what_we_offer['en'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Vision</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="vision_en"
                    id="vision_en"
                    :value="old('vision_en', $about?->vision['en'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Mission</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="mission_en"
                    id="mission_en"
                    :value="old('mission_en', $about?->mission['en'] ?? '')"
                />
            </div>

        </div>

        <div class="language-content" id="language-mk">

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Кои сме ние</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="who_we_are_mk"
                    id="who_we_are_mk"
                    :value="old('who_we_are_mk', $about?->who_we_are['mk'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Што нудиме</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="what_we_offer_mk"
                    id="what_we_offer_mk"
                    :value="old('what_we_offer_mk', $about?->what_we_offer['mk'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Визија</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="vision_mk"
                    id="vision_mk"
                    :value="old('vision_mk', $about?->vision['mk'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Мисија</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="mission_mk"
                    id="mission_mk"
                    :value="old('mission_mk', $about?->mission['mk'] ?? '')"
                />
            </div>

        </div>

        <div class="language-content" id="language-al">

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Kush jemi ne</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="who_we_are_al"
                    id="who_we_are_al"
                    :value="old('who_we_are_al', $about?->who_we_are['al'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Çfarë ofrojmë</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="what_we_offer_al"
                    id="what_we_offer_al"
                    :value="old('what_we_offer_al', $about?->what_we_offer['al'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Vizioni</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="vision_al"
                    id="vision_al"
                    :value="old('vision_al', $about?->vision['al'] ?? '')"
                />
            </div>

            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Misioni</h2>
                    </div>
                </div>

                <x-rich-text::input
                    name="mission_al"
                    id="mission_al"
                    :value="old('mission_al', $about?->mission['al'] ?? '')"
                />
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