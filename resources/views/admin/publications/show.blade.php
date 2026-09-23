@extends('layouts.admin')

@section('title', 'View Publication | Multikultura')

@push('styles')
    <x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">

    <div class="left">

        <h1>View Publication</h1>

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
                <a href="{{ route('admin.publications.index') }}">
                    Publications
                </a>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <span class="text">
                    View Publication
                </span>
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

                    <h2>
                        Publication Information
                    </h2>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Title
                </label>

                <div class="form-input">
                    {{ $publication->title['en'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Short Description
                </label>

                <div class="form-input">
                    {{ $publication->short_description['en'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Detailed Description
                </label>

                <div class="form-input rich-text-view">

                    {!! $publication->detailed_description['en'] ?? '<span class="text-muted">—</span>' !!}

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MACEDONIAN
    ========================================================== --}}

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

                    <h2>
                        Информации за публикацијата
                    </h2>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Наслов
                </label>

                <div class="form-input">
                    {{ $publication->title['mk'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Краток опис
                </label>

                <div class="form-input">
                    {{ $publication->short_description['mk'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Детален опис
                </label>

                <div class="form-input rich-text-view">

                    {!! $publication->detailed_description['mk'] ?? '<span class="text-muted">—</span>' !!}

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         ALBANIAN
    ========================================================== --}}

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

                    <h2>
                        Informacionet e publikacionit
                    </h2>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Titulli
                </label>

                <div class="form-input">
                    {{ $publication->title['al'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Përshkrim i shkurtër
                </label>

                <div class="form-input">
                    {{ $publication->short_description['al'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Përshkrim i detajuar
                </label>

                <div class="form-input rich-text-view">

                    {!! $publication->detailed_description['al'] ?? '<span class="text-muted">—</span>' !!}

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

                <span class="section-label">
                    Publications
                </span>

                <h2>
                    Additional Information
                </h2>

            </div>

        </div>


        <div class="form-row">


            {{-- DATE --}}
            <div class="form-group">

                <label>
                    Date
                </label>

                <div class="form-input">

                    {{ $publication->date
                        ? \Carbon\Carbon::parse($publication->date)->format('d M Y')
                        : '—'
                    }}

                </div>

            </div>


            {{-- IMAGE --}}
            <div class="form-group">

                <label>
                    Image
                </label>

                @if($publication->image)

                    <div style="margin-top: 8px;">

                        <img
                            src="{{ asset('storage/' . $publication->image) }}"
                            alt="Publication image"
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


            {{-- FILE --}}
            <div class="form-group">

                <label>
                    File
                </label>

                @if($publication->file)

                    <div style="margin-top: 8px;">

                        <a
                            href="{{ asset('storage/' . $publication->file) }}"
                            target="_blank"
                            class="btn btn-outline-primary btn-sm"
                        >
                            <i class="bi bi-file-earmark-text"></i>
                            View File
                        </a>

                    </div>

                @else

                    <div class="form-input">
                        No file
                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =========================================================
         ACTIONS
    ========================================================== --}}

    <div class="actions">

        <a
            href="{{ route('admin.publications.index') }}"
            class="cancel-button"
        >
            <i class='bx bx-arrow-back'></i>
            Back to Publications
        </a>


        <a
            href="{{ route('admin.publications.edit', $publication->id) }}"
            class="save-button"
        >
            <i class='bx bx-edit'></i>
            Edit Publication
        </a>

    </div>

</div>

@endsection