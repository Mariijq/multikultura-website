@extends('layouts.admin')

@section('title', 'View News | Multikultura')

@push('styles')
<x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">
    <div class="left">

    <h1>View News</h1>

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
            <span class="text">View News</span>
        </li>

    </ul>

</div>

</div>

<div class="dashboard-container">

{{-- =========================================================
     LANGUAGE TABS
========================================================== --}}

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

            <label>Title</label>

            <div class="form-input">
                {{ $news->title['en'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Subtitle</label>

            <div class="form-input">
                {{ $news->subtitle['en'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Short Description</label>

            <div class="form-input">
                {{ $news->short_description['en'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Detailed Description</label>

            <div class="form-input rich-text-view">

                {!! $news->detailed_description['en'] ?? '<span class="text-muted">—</span>' !!}

            </div>

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

            <label>Наслов</label>

            <div class="form-input">
                {{ $news->title['mk'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Поднаслов</label>

            <div class="form-input">
                {{ $news->subtitle['mk'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Краток опис</label>

            <div class="form-input">
                {{ $news->short_description['mk'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Детален опис</label>

            <div class="form-input rich-text-view">

                {!! $news->detailed_description['mk'] ?? '<span class="text-muted">—</span>' !!}

            </div>

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

            <label>Titulli</label>

            <div class="form-input">
                {{ $news->title['al'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Nëntitulli</label>

            <div class="form-input">
                {{ $news->subtitle['al'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Përshkrim i shkurtër</label>

            <div class="form-input">
                {{ $news->short_description['al'] ?? '—' }}
            </div>

        </div>


        <div class="form-group">

            <label>Përshkrim i detajuar</label>

            <div class="form-input rich-text-view">

                {!! $news->detailed_description['al'] ?? '<span class="text-muted">—</span>' !!}

            </div>

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

            <label>Date</label>

            <div class="form-input">
                {{ $news->date
                    ? \Carbon\Carbon::parse($news->date)->format('d M Y')
                    : '—'
                }}
            </div>

        </div>


        <div class="form-group">

            <label>Image</label>

            @if($news->image)

                <div style="margin-top: 8px;">

                    <img
                        src="{{ asset('storage/' . $news->image) }}"
                        alt="News image"
                        style="
                            width: 220px;
                            height: 150px;
                            object-fit: cover;
                            border-radius: 10px;
                            display: block;
                        "
                    >

                </div>

            @else

                <div class="form-input">
                    No image
                </div>

            @endif

        </div>

    </div>


    <div class="form-group">

        <label>Link</label>

        @if($news->link)

            <div class="form-input">

                <a
                    href="{{ $news->link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    {{ $news->link }}
                </a>

            </div>

        @else

            <div class="form-input">
                —
            </div>

        @endif

    </div>


    <div class="form-group">

        <label>Video</label>

        @if($news->video)

            <video
                controls
                style="
                    width: 500px;
                    max-width: 100%;
                    border-radius: 10px;
                    display: block;
                "
            >
                <source
                    src="{{ asset('storage/' . $news->video) }}"
                    type="video/mp4"
                >

                Your browser does not support video playback.

            </video>

        @else

            <div class="form-input">
                No video
            </div>

        @endif

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
        <i class='bx bx-arrow-back'></i>
        Back to News
    </a>


    <a
        href="{{ route('admin.news.edit', $news->id) }}"
        class="save-button"
    >
        <i class='bx bx-edit'></i>
        Edit News
    </a>

</div>

</div>

@endsection
