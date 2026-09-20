@extends('layouts.admin')

@section('title', 'Add Project | Multikultura')

@push('styles')
    <x-rich-text::styles />
@endpush

@section('content')

<div class="head-title">
    <div class="left">

        <h1>Add Project</h1>

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
                <span class="text">Add Project</span>
            </li>

        </ul>

    </div>
</div>

<div class="dashboard-container">

    {{-- LANGUAGE TABS --}}
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


    <form method="POST"
          action="{{ route('admin.projects.store') }}"
          enctype="multipart/form-data">

        @csrf


        {{-- =========================
             ENGLISH
        ========================== --}}
        <div class="language-content active"
             id="language-en">

            <div class="dashboard-card">

                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Project Information</h2>
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
                        value="{{ old('title_en') }}"
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
                    >{{ old('short_description_en') }}</textarea>

                </div>


                <div class="form-group">

                    <label for="detailed_description_en">
                        Detailed Description
                    </label>

                    <x-rich-text::input
                        name="detailed_description_en"
                        id="detailed_description_en"
                        :value="old('detailed_description_en')"
                    />

                </div>

            </div>

        </div>


        {{-- =========================
             MACEDONIAN
        ========================== --}}
        <div class="language-content"
             id="language-mk">

            <div class="dashboard-card">

                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Информации за проект</h2>
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
                        value="{{ old('title_mk') }}"
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
                    >{{ old('short_description_mk') }}</textarea>

                </div>


                <div class="form-group">

                    <label for="detailed_description_mk">
                        Детален опис
                    </label>

                    <x-rich-text::input
                        name="detailed_description_mk"
                        id="detailed_description_mk"
                        :value="old('detailed_description_mk')"
                    />

                </div>

            </div>

        </div>


        {{-- =========================
             ALBANIAN
        ========================== --}}
        <div class="language-content"
             id="language-al">

            <div class="dashboard-card">

                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Informacionet e projektit</h2>
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
                        value="{{ old('title_al') }}"
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
                    >{{ old('short_description_al') }}</textarea>

                </div>


                <div class="form-group">

                    <label for="detailed_description_al">
                        Përshkrim i detajuar
                    </label>

                    <x-rich-text::input
                        name="detailed_description_al"
                        id="detailed_description_al"
                        :value="old('detailed_description_al')"
                    />

                </div>

            </div>

        </div>


        {{-- =========================
             ADDITIONAL INFORMATION
        ========================== --}}
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
                        value="{{ old('date') }}"
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
                            {{ old('status', 'Ongoing') === 'Ongoing' ? 'selected' : '' }}
                        >
                            Ongoing
                        </option>

                        <option
                            value="Finished"
                            {{ old('status') === 'Finished' ? 'selected' : '' }}
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

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-input"
                        accept="image/*"
                    >

                </div>

            </div>

        </div>


        {{-- ACTIONS --}}
        <div class="actions">

            <a href="{{ route('admin.projects.index') }}"
               class="cancel-button">
                Cancel
            </a>

            <button
                type="submit"
                class="save-button"
            >
                <i class='bx bx-save'></i>
                Save Project
            </button>

        </div>

    </form>

</div>

@endsection