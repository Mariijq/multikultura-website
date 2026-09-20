@extends('layouts.admin')

@section('title', 'Edit News | Multikultura')

@push('styles')
<x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Edit News</h1>

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
            <a href="{{ route('admin.news.index') }}">
                News
            </a>
        </li>

        <li>
            <i class='bx bx-chevron-right'></i>
        </li>

        <li>
            <span class="text">Edit News</span>
        </li>
    </ul>
</div>

</div>

<div class="dashboard-container">

{{-- Validation errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- Language tabs --}}
<div class="language-tabs">

    <button type="button"
            class="language-tab active"
            data-language="en">
        <span>English</span>
    </button>

    <button type="button"
            class="language-tab"
            data-language="mk">
        <span>Македонски</span>
    </button>

    <button type="button"
            class="language-tab"
            data-language="al">
        <span>Shqip</span>
    </button>

</div>


{{-- Update form --}}
<form method="POST"
      action="{{ route('admin.news.update', $news->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')


    {{-- =========================================================
         ENGLISH
    ========================================================== --}}
    <div class="language-content active" id="language-en">

        <div class="dashboard-card">

            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">English</span>
                    <h2>News Information</h2>
                </div>
            </div>


            <div class="form-group">
                <label for="title_en">Title</label>

                <input
                    type="text"
                    name="title_en"
                    id="title_en"
                    value="{{ old('title_en', $news->title['en'] ?? '') }}"
                    class="form-input"
                    placeholder="Enter news title"
                >
            </div>


            <div class="form-group">
                <label for="subtitle_en">Subtitle</label>

                <input
                    type="text"
                    name="subtitle_en"
                    id="subtitle_en"
                    value="{{ old('subtitle_en', $news->subtitle['en'] ?? '') }}"
                    class="form-input"
                    placeholder="Enter subtitle"
                >
            </div>


            <div class="form-group">
                <label for="short_description_en">
                    Short Description
                </label>

                <textarea
                    name="short_description_en"
                    id="short_description_en"
                    class="form-input"
                    rows="4"
                    placeholder="Enter short description"
                >{{ old('short_description_en', $news->short_description['en'] ?? '') }}</textarea>
            </div>


            <div class="form-group">
                <label for="detailed_description_en">
                    Detailed Description
                </label>

                <x-rich-text::input
                    name="detailed_description_en"
                    id="detailed_description_en"
                    :value="old(
                        'detailed_description_en',
                        $news->detailed_description['en'] ?? ''
                    )"
                />
            </div>

        </div>

    </div>


    {{-- =========================================================
         MACEDONIAN
    ========================================================== --}}
    <div class="language-content" id="language-mk">

        <div class="dashboard-card">

            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Македонски</span>
                    <h2>Информации за вест</h2>
                </div>
            </div>


            <div class="form-group">
                <label for="title_mk">Наслов</label>

                <input
                    type="text"
                    name="title_mk"
                    id="title_mk"
                    value="{{ old('title_mk', $news->title['mk'] ?? '') }}"
                    class="form-input"
                    placeholder="Внесете наслов"
                >
            </div>


            <div class="form-group">
                <label for="subtitle_mk">Поднаслов</label>

                <input
                    type="text"
                    name="subtitle_mk"
                    id="subtitle_mk"
                    value="{{ old('subtitle_mk', $news->subtitle['mk'] ?? '') }}"
                    class="form-input"
                    placeholder="Внесете поднаслов"
                >
            </div>


            <div class="form-group">
                <label for="short_description_mk">
                    Краток опис
                </label>

                <textarea
                    name="short_description_mk"
                    id="short_description_mk"
                    class="form-input"
                    rows="4"
                    placeholder="Внесете краток опис"
                >{{ old('short_description_mk', $news->short_description['mk'] ?? '') }}</textarea>
            </div>


            <div class="form-group">
                <label for="detailed_description_mk">
                    Детален опис
                </label>

                <x-rich-text::input
                    name="detailed_description_mk"
                    id="detailed_description_mk"
                    :value="old(
                        'detailed_description_mk',
                        $news->detailed_description['mk'] ?? ''
                    )"
                />
            </div>

        </div>

    </div>


    {{-- =========================================================
         ALBANIAN
    ========================================================== --}}
    <div class="language-content" id="language-al">

        <div class="dashboard-card">

            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Shqip</span>
                    <h2>Informacionet e lajmit</h2>
                </div>
            </div>


            <div class="form-group">
                <label for="title_al">Titulli</label>

                <input
                    type="text"
                    name="title_al"
                    id="title_al"
                    value="{{ old('title_al', $news->title['al'] ?? '') }}"
                    class="form-input"
                    placeholder="Shkruani titullin"
                >
            </div>


            <div class="form-group">
                <label for="subtitle_al">Nëntitulli</label>

                <input
                    type="text"
                    name="subtitle_al"
                    id="subtitle_al"
                    value="{{ old('subtitle_al', $news->subtitle['al'] ?? '') }}"
                    class="form-input"
                    placeholder="Shkruani nëntitullin"
                >
            </div>


            <div class="form-group">
                <label for="short_description_al">
                    Përshkrim i shkurtër
                </label>

                <textarea
                    name="short_description_al"
                    id="short_description_al"
                    class="form-input"
                    rows="4"
                    placeholder="Shkruani përshkrimin e shkurtër"
                >{{ old('short_description_al', $news->short_description['al'] ?? '') }}</textarea>
            </div>


            <div class="form-group">
                <label for="detailed_description_al">
                    Përshkrim i detajuar
                </label>

                <x-rich-text::input
                    name="detailed_description_al"
                    id="detailed_description_al"
                    :value="old(
                        'detailed_description_al',
                        $news->detailed_description['al'] ?? ''
                    )"
                />
            </div>

        </div>

    </div>


    {{-- =========================================================
         ADDITIONAL INFORMATION
    ========================================================== --}}
    <div class="dashboard-card">

        <div class="dashboard-card-header">
            <div>
                <span class="section-label">News</span>
                <h2>Additional Information</h2>
            </div>
        </div>


        <div class="form-row">

            <div class="form-group">

                <label for="date">Date</label>

                <input
                    type="date"
                    name="date"
                    id="date"
                    value="{{ old(
                        'date',
                        $news->date
                            ? \Carbon\Carbon::parse($news->date)->format('Y-m-d')
                            : ''
                    ) }}"
                    class="form-input"
                >

            </div>


            <div class="form-group">

                <label for="image">Image</label>

                @if($news->image)

                    <div style="margin-bottom: 12px;">

                        <img
                            src="{{ asset('storage/' . $news->image) }}"
                            alt="Current news image"
                            style="
                                width: 150px;
                                height: 100px;
                                object-fit: cover;
                                border-radius: 8px;
                                display: block;
                            "
                        >

                        <small style="display:block; margin-top:6px;">
                            Current image
                        </small>

                    </div>

                @endif


                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-input"
                    accept="image/*"
                >

                <small>
                    Leave empty if you do not want to change the image.
                </small>

            </div>

        </div>


        <div class="form-group">

            <label for="link">Link</label>

            <input
                type="url"
                name="link"
                id="link"
                value="{{ old('link', $news->link ?? '') }}"
                class="form-input"
                placeholder="https://..."
            >

        </div>


        <div class="form-group">

            <label for="video">Video</label>

            @if($news->video)

                <div style="margin-bottom: 12px;">

                    <video
                        controls
                        style="
                            width: 300px;
                            max-width: 100%;
                            border-radius: 8px;
                        "
                    >
                        <source
                            src="{{ asset('storage/' . $news->video) }}"
                            type="video/mp4"
                        >
                        Your browser does not support video playback.
                    </video>

                    <small style="display:block; margin-top:6px;">
                        Current video
                    </small>

                </div>

            @endif


            <input
                type="file"
                name="video"
                id="video"
                class="form-input"
                accept="video/mp4,video/webm,video/ogg"
            >

            <small>
                Leave empty if you do not want to change the video.
            </small>

        </div>

    </div>


    {{-- =========================================================
         ACTIONS
    ========================================================== --}}
    <div class="actions">

        <a
            href="{{ route('admin.news.index') }}"
            class="cancel-button"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="save-button"
        >
            <i class='bx bx-save'></i>
            Update News
        </button>

    </div>

</form>

</div>

@endsection
