
@extends('layouts.admin')

@section('title', 'View Partner | Multikultura')

@section('content')

<div class="head-title">
    <div class="left">
        <h1>View Partner</h1>

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
                <span class="text">View Partner</span>
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
                <label>Partner Name</label>
                <div class="form-input">
                    {{ $partner->name['en'] ?? '—' }}
                </div>
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
                <label>Име на партнерот</label>
                <div class="form-input">
                    {{ $partner->name['mk'] ?? '—' }}
                </div>
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
                <label>Emri i partnerit</label>
                <div class="form-input">
                    {{ $partner->name['al'] ?? '—' }}
                </div>
            </div>
        </div>
    </div>

    {{-- LOGO AND DATES --}}
    <div class="dashboard-card">
        <div class="dashboard-card-header">
            <div>
                <span class="section-label">Partner</span>
                <h2>Additional Information</h2>
            </div>
        </div>

        <div class="form-group">
            <label>Partner ID</label>
            <div class="form-input">{{ $partner->id }}</div>
        </div>

        <div class="form-group">
            <label>Logo</label>

            @if ($partner->image)
                <div style="margin-top:10px;">
                    <img
                        src="{{ asset('storage/' . $partner->image) }}"
                        alt="{{ $partner->name['en'] ?? $partner->name['mk'] ?? 'Partner logo' }}"
                        style="max-width:280px; max-height:200px; object-fit:contain; border-radius:8px;"
                    >
                </div>
            @else
                <div class="form-input">No logo uploaded.</div>
            @endif
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Created At</label>
                <div class="form-input">
                    {{ $partner->created_at?->format('d M Y, H:i') ?? '—' }}
                </div>
            </div>

            <div class="form-group">
                <label>Updated At</label>
                <div class="form-input">
                    {{ $partner->updated_at?->format('d M Y, H:i') ?? '—' }}
                </div>
            </div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('admin.partners.index') }}" class="cancel-button">
            <i class='bx bx-arrow-back'></i>
            Back to Partners
        </a>

        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="save-button">
            <i class='bx bx-edit'></i>
            Edit Partner
        </a>
    </div>

</div>

@endsection
