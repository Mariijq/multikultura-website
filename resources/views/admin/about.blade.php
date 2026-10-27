@extends('layouts.admin')

@section('title', 'About Us | Multikultura')

@section('content')

<div class="head-title">

    <div class="left">

        <h1>About Us</h1>

        <ul class="breadcrumb">

            <li>
                <span class="text">Dashboard</span>
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

    <form
        method="POST"
        action="{{ route('admin.about.update') }}"
        enctype="multipart/form-data"
    >

        @csrf


        {{-- =====================================================
             HERO IMAGE
        ====================================================== --}}

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div>

                    <span class="section-label">
                        About Us
                    </span>

                    <h2>Hero Image</h2>

                </div>

            </div>


            @if($about?->hero_image)

                <div
                    style="
                        width: 100%;
                        max-width: 1000px;
                        margin-bottom: 20px;
                    "
                >

                    <img
                        src="{{ asset('storage/' . $about->hero_image) }}"
                        alt="About Us Hero"
                        style="
                            display: block;
                            width: 100%;
                            max-height: 450px;
                            object-fit: cover;
                            border-radius: 8px;
                        "
                    >

                </div>

                <div
                    style="
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        margin-bottom: 20px;
                    "
                >

                    <input
                        type="checkbox"
                        name="remove_hero_image"
                        id="remove_hero_image"
                        value="1"
                    >

                    <label for="remove_hero_image">
                        Remove current hero image
                    </label>

                </div>

            @endif


            <div class="form-group">

                <label for="hero_image">
                    {{ $about?->hero_image ? 'Replace Hero Image' : 'Upload Hero Image' }}
                </label>

                <input
                    type="file"
                    name="hero_image"
                    id="hero_image"
                    class="form-control"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                >

                <small>
                    Allowed formats: JPG, JPEG, PNG, GIF, WEBP.
                    Maximum size: 10 MB.
                </small>

            </div>

        </div>


        {{-- =====================================================
             LANGUAGE TABS
        ====================================================== --}}

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


        {{-- =====================================================
             ENGLISH
        ====================================================== --}}

        <div
            class="language-content active"
            id="language-en"
        >

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            English
                        </span>

                        <h2>Who We Are</h2>

                    </div>

                </div>

                <textarea
                    name="who_we_are_en"
                    class="form-control"
                    rows="6"
                >{{ old('who_we_are_en', $about?->who_we_are['en'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            English
                        </span>

                        <h2>What We Offer</h2>

                    </div>

                </div>

                <textarea
                    name="what_we_offer_en"
                    class="form-control"
                    rows="6"
                >{{ old('what_we_offer_en', $about?->what_we_offer['en'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            English
                        </span>

                        <h2>Vision</h2>

                    </div>

                </div>

                <textarea
                    name="vision_en"
                    class="form-control"
                    rows="6"
                >{{ old('vision_en', $about?->vision['en'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            English
                        </span>

                        <h2>Mission</h2>

                    </div>

                </div>

                <textarea
                    name="mission_en"
                    class="form-control"
                    rows="6"
                >{{ old('mission_en', $about?->mission['en'] ?? '') }}</textarea>

            </div>

        </div>


        {{-- =====================================================
             MACEDONIAN
        ====================================================== --}}

        <div
            class="language-content"
            id="language-mk"
        >

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Македонски
                        </span>

                        <h2>Кои сме ние</h2>

                    </div>

                </div>

                <textarea
                    name="who_we_are_mk"
                    class="form-control"
                    rows="6"
                >{{ old('who_we_are_mk', $about?->who_we_are['mk'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Македонски
                        </span>

                        <h2>Што нудиме</h2>

                    </div>

                </div>

                <textarea
                    name="what_we_offer_mk"
                    class="form-control"
                    rows="6"
                >{{ old('what_we_offer_mk', $about?->what_we_offer['mk'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Македонски
                        </span>

                        <h2>Визија</h2>

                    </div>

                </div>

                <textarea
                    name="vision_mk"
                    class="form-control"
                    rows="6"
                >{{ old('vision_mk', $about?->vision['mk'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Македонски
                        </span>

                        <h2>Мисија</h2>

                    </div>

                </div>

                <textarea
                    name="mission_mk"
                    class="form-control"
                    rows="6"
                >{{ old('mission_mk', $about?->mission['mk'] ?? '') }}</textarea>

            </div>

        </div>


        {{-- =====================================================
             ALBANIAN
        ====================================================== --}}

        <div
            class="language-content"
            id="language-al"
        >

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Shqip
                        </span>

                        <h2>Kush jemi ne</h2>

                    </div>

                </div>

                <textarea
                    name="who_we_are_al"
                    class="form-control"
                    rows="6"
                >{{ old('who_we_are_al', $about?->who_we_are['al'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Shqip
                        </span>

                        <h2>Çfarë ofrojmë</h2>

                    </div>

                </div>

                <textarea
                    name="what_we_offer_al"
                    class="form-control"
                    rows="6"
                >{{ old('what_we_offer_al', $about?->what_we_offer['al'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Shqip
                        </span>

                        <h2>Vizioni</h2>

                    </div>

                </div>

                <textarea
                    name="vision_al"
                    class="form-control"
                    rows="6"
                >{{ old('vision_al', $about?->vision['al'] ?? '') }}</textarea>

            </div>


            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <div>

                        <span class="section-label">
                            Shqip
                        </span>

                        <h2>Misioni</h2>

                    </div>

                </div>

                <textarea
                    name="mission_al"
                    class="form-control"
                    rows="6"
                >{{ old('mission_al', $about?->mission['al'] ?? '') }}</textarea>

            </div>

        </div>


        {{-- =====================================================
             SAVE
        ====================================================== --}}

        <div class="actions">

            <button
                type="submit"
                class="save-button"
            >
                <i class='bx bx-save'></i>
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection