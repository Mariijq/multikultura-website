@extends('layouts.frontend')

@section('title')
    {{ $publication->title[app()->getLocale()] ?? $publication->title['en'] ?? '' }} | Multikultura
@endsection

@section('content')

@php
    $locale = app()->getLocale();

    $title = $publication->title[$locale]
        ?? $publication->title['en']
        ?? $publication->title['mk']
        ?? '';

    $shortDescription = $publication->short_description[$locale]
        ?? $publication->short_description['en']
        ?? $publication->short_description['mk']
        ?? '';

    $detailedDescription = $publication->detailed_description[$locale]
        ?? $publication->detailed_description['en']
        ?? $publication->detailed_description['mk']
        ?? '';
@endphp

<section class="publication-detail-page">

    <div class="publication-detail-container">

        {{-- TITLE --}}
        <h1 class="publication-detail-title">
            {{ $title }}
        </h1>

        {{-- IMAGE --}}
        @if($publication->image)
            <div
                class="publication-detail-image"
                style="width: 100%; overflow: hidden;"
            >
                <img
                    src="{{ asset('storage/' . $publication->image) }}"
                    alt="{{ $title }}"
                    style="
                        width: 100%;
                        height: auto;
                        display: block;
                        object-fit: contain;
                    "
                >
            </div>
        @endif

        {{-- DATE --}}
        @if($publication->date)
            <div class="publication-detail-date">
                {{ \Carbon\Carbon::parse($publication->date)->format('d.m.Y') }}
            </div>
        @endif

        {{-- SHORT DESCRIPTION --}}
        @if($shortDescription)
            <div class="publication-detail-short-description">
                {!! $shortDescription !!}
            </div>
        @endif

        {{-- DETAILED DESCRIPTION --}}
        @if($detailedDescription)
            <div class="publication-detail-description">
                {!! $detailedDescription !!}
            </div>
        @endif

        {{-- FILE --}}
        @if($publication->file)
            <div class="publication-detail-file">
                <a
                    href="{{ asset('storage/' . $publication->file) }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <i class="bi bi-file-earmark-arrow-down"></i>
                    {{ __('frontend.download_publication') }}
                </a>
            </div>
        @endif

    </div>

</section>

@endsection
