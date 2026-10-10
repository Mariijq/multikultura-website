
@extends('layouts.admin')

@section('title', 'Add Partner | Multikultura')

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Add Partner</h1>

        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a href="{{ route('admin.partners.index') }}">Partners</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <span class="text">Add Partner</span>
            </li>
        </ul>
    </div>
</div>

<div class="dashboard-container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    <form method="POST"
          action="{{ route('admin.partners.store') }}"
          enctype="multipart/form-data">

        @csrf

        {{-- ENGLISH --}}
        <div class="language-content active" id="language-en">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">English</span>
                        <h2>Partner Information</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name_en">Partner Name</label>

                    <input
                        type="text"
                        name="name[en]"
                        id="name_en"
                        value="{{ old('name.en') }}"
                        class="form-input"
                        placeholder="Enter partner name"
                        maxlength="255"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- MACEDONIAN --}}
        <div class="language-content" id="language-mk">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Македонски</span>
                        <h2>Информации за партнерот</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name_mk">Име на партнерот</label>

                    <input
                        type="text"
                        name="name[mk]"
                        id="name_mk"
                        value="{{ old('name.mk') }}"
                        class="form-input"
                        placeholder="Внесете име на партнерот"
                        maxlength="255"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- ALBANIAN --}}
        <div class="language-content" id="language-al">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div>
                        <span class="section-label">Shqip</span>
                        <h2>Informacionet e partnerit</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name_al">Emri i partnerit</label>

                    <input
                        type="text"
                        name="name[al]"
                        id="name_al"
                        value="{{ old('name.al') }}"
                        class="form-input"
                        placeholder="Shkruani emrin e partnerit"
                        maxlength="255"
                        required
                    >
                </div>
            </div>
        </div>

        {{-- PARTNER LOGO --}}
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <div>
                    <span class="section-label">Partner</span>
                    <h2>Logo</h2>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Partner Logo</label>

                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-input @error('image') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/webp"
                    required
                >

                <small>Allowed formats: JPG, JPEG, PNG, WEBP. Maximum size: 2 MB.</small>

                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div style="margin-top:15px;">
                    <img
                        id="image-preview"
                        src=""
                        alt="Logo preview"
                        style="display:none; max-width:250px; max-height:180px; object-fit:contain; border-radius:8px;"
                    >
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('admin.partners.index') }}" class="cancel-button">
                Cancel
            </a>

            <button type="submit" class="save-button">
                <i class='bx bx-save'></i>
                Save Partner
            </button>
        </div>

    </form>
</div>

@endsection
