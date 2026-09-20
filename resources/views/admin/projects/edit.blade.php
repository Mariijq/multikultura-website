@extends('layouts.admin')

@section('title', 'Edit Project | Multikultura')

@push('styles')
    <x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">

    <div class="left">

        <h1>Edit Project</h1>

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
                    Edit Project
                </span>
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

                    <li>
                        {{ $error }}
                    </li>

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


    {{-- Update form --}}
    <form
        method="POST"
        action="{{ route('admin.projects.update', $project->id) }}"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


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

                    <label for="title_en">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title_en"
                        id="title_en"
                        value="{{ old('title_en', $project->title['en'] ?? '') }}"
                        class="form-input"
                        placeholder="Enter project title"
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
                    >{{ old('short_description_en', $project->short_description['en'] ?? '') }}</textarea>

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
                            $project->detailed_description['en'] ?? ''
                        )"
                    />

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

                    <label for="title_mk">
                        Наслов
                    </label>

                    <input
                        type="text"
                        name="title_mk"
                        id="title_mk"
                        value="{{ old('title_mk', $project->title['mk'] ?? '') }}"
                        class="form-input"
                        placeholder="Внесете наслов"
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
                    >{{ old('short_description_mk', $project->short_description['mk'] ?? '') }}</textarea>

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
                            $project->detailed_description['mk'] ?? ''
                        )"
                    />

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

                    <label for="title_al">
                        Titulli
                    </label>

                    <input
                        type="text"
                        name="title_al"
                        id="title_al"
                        value="{{ old('title_al', $project->title['al'] ?? '') }}"
                        class="form-input"
                        placeholder="Shkruani titullin"
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
                    >{{ old('short_description_al', $project->short_description['al'] ?? '') }}</textarea>

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
                            $project->detailed_description['al'] ?? ''
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

                    <label for="date">
                        Date
                    </label>

                    <input
                        type="date"
                        name="date"
                        id="date"
                        value="{{ old(
                            'date',
                            $project->date
                                ? \Carbon\Carbon::parse($project->date)->format('Y-m-d')
                                : ''
                        ) }}"
                        class="form-input"
                    >

                </div>


                {{-- STATUS --}}
                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-input"
                        required
                    >

                        <option
                            value="Ongoing"
                            {{ old('status', $project->status) === 'Ongoing' ? 'selected' : '' }}
                        >
                            Ongoing
                        </option>

                        <option
                            value="Finished"
                            {{ old('status', $project->status) === 'Finished' ? 'selected' : '' }}
                        >
                            Finished
                        </option>

                    </select>

                </div>


                {{-- IMAGE --}}
                <div class="form-group">

                    <label for="image">
                        Image
                    </label>


                    @if($project->image)

                        <div style="margin-bottom: 12px;">

                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="Current project image"
                                style="
                                    width: 150px;
                                    height: 100px;
                                    object-fit: cover;
                                    border-radius: 8px;
                                    display: block;
                                "
                            >

                            <small
                                style="
                                    display:block;
                                    margin-top:6px;
                                "
                            >
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

        </div>


        {{-- =========================================================
             ACTIONS
        ========================================================== --}}
        <div class="actions">

            <a
                href="{{ route('admin.projects.index') }}"
                class="cancel-button"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="save-button"
            >
                <i class='bx bx-save'></i>
                Update Project
            </button>

        </div>

    </form>

</div>

@endsection