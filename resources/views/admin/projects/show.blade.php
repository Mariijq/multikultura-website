@extends('layouts.admin')

@section('title', 'View Project | Multikultura')

@push('styles')
    <x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">

    <div class="left">

        <h1>View Project</h1>

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
                <a href="{{ route('admin.projects.index') }}">
                    Projects
                </a>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <span class="text">
                    View Project
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
                        Project Information
                    </h2>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Title
                </label>

                <div class="form-input">
                    {{ $project->title['en'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Short Description
                </label>

                <div class="form-input">
                    {{ $project->short_description['en'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Detailed Description
                </label>

                <div class="form-input rich-text-view">

                    {!! $project->detailed_description['en'] ?? '<span class="text-muted">—</span>' !!}

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
                        Информации за проект
                    </h2>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Наслов
                </label>

                <div class="form-input">
                    {{ $project->title['mk'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Краток опис
                </label>

                <div class="form-input">
                    {{ $project->short_description['mk'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Детален опис
                </label>

                <div class="form-input rich-text-view">

                    {!! $project->detailed_description['mk'] ?? '<span class="text-muted">—</span>' !!}

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
                        Informacionet e projektit
                    </h2>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Titulli
                </label>

                <div class="form-input">
                    {{ $project->title['al'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Përshkrim i shkurtër
                </label>

                <div class="form-input">
                    {{ $project->short_description['al'] ?? '—' }}
                </div>

            </div>


            <div class="form-group">

                <label>
                    Përshkrim i detajuar
                </label>

                <div class="form-input rich-text-view">

                    {!! $project->detailed_description['al'] ?? '<span class="text-muted">—</span>' !!}

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
                    Projects
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

                    {{ $project->date
                        ? \Carbon\Carbon::parse($project->date)->format('d M Y')
                        : '—'
                    }}

                </div>

            </div>


            {{-- STATUS --}}
            <div class="form-group">

                <label>
                    Status
                </label>

                <div class="form-input">

                    {{ $project->status ?? '—' }}

                </div>

            </div>


            {{-- IMAGE --}}
            <div class="form-group">

                <label>
                    Image
                </label>

                @if($project->image)

                    <div style="margin-top: 8px;">

                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="Project image"
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

    </div>


    {{-- =========================================================
         ACTIONS
    ========================================================== --}}

    <div class="actions">

        <a
            href="{{ route('admin.projects.index') }}"
            class="cancel-button"
        >
            <i class='bx bx-arrow-back'></i>
            Back to Projects
        </a>


        <a
            href="{{ route('admin.projects.edit', $project->id) }}"
            class="save-button"
        >
            <i class='bx bx-edit'></i>
            Edit Project
        </a>

    </div>

</div>

@endsection