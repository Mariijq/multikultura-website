@extends('layouts.frontend')

@section('title')
    {{ $project->title[app()->getLocale()] ?? $project->title['en'] ?? '' }} | Multikultura
@endsection

@section('content')

@php
    $locale = app()->getLocale();

    $title = $project->title[$locale]
        ?? $project->title['en']
        ?? $project->title['mk']
        ?? '';

    $shortDescription = $project->short_description[$locale]
        ?? $project->short_description['en']
        ?? $project->short_description['mk']
        ?? '';

    $detailedDescription = $project->detailed_description[$locale]
        ?? $project->detailed_description['en']
        ?? $project->detailed_description['mk']
        ?? '';
@endphp

<section class="project-detail-page">

    <div class="project-detail-container">

        {{-- TITLE --}}
        <h1 class="project-detail-title">
            {{ $title }}
        </h1>

        {{-- IMAGE --}}
        @if($project->image)
            <div class="project-detail-image">
                <img
                    src="{{ asset('storage/' . $project->image) }}"
                    alt="{{ $title }}"
                >
            </div>
        @endif

        {{-- DATE + STATUS --}}
        <div class="project-detail-meta">

            @if($project->date)
                <span class="project-detail-date">
                    {{ \Carbon\Carbon::parse($project->date)->format('d.m.Y') }}
                </span>
            @endif

            @if($project->status)
                <span class="project-detail-status">
                    {{ $project->status }}
                </span>
            @endif

        </div>

        {{-- SHORT DESCRIPTION --}}
        @if($shortDescription)
            <div class="project-detail-short-description">
                {!! $shortDescription !!}
            </div>
        @endif

        {{-- DETAILED DESCRIPTION --}}
        @if($detailedDescription)
            <div class="project-detail-description">
                {!! $detailedDescription !!}
            </div>
        @endif

    </div>

</section>

@endsection