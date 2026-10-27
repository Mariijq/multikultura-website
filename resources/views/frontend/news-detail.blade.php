@extends('layouts.frontend')

@section('title')
    {{ $news->title[app()->getLocale()] ?? $news->title['en'] ?? '' }} | Multikultura
@endsection

@section('content')

@php
    $locale = app()->getLocale();

    $title = $news->title[$locale]
        ?? $news->title['en']
        ?? $news->title['mk']
        ?? '';

    $shortDescription = $news->short_description[$locale]
        ?? $news->short_description['en']
        ?? $news->short_description['mk']
        ?? '';

    $description = $news->detailed_description[$locale]
        ?? $news->detailed_description['en']
        ?? $news->detailed_description['mk']
        ?? '';
@endphp

<section class="news-detail-page">

    <div class="news-detail-container">

        {{-- Title --}}
        <h1 class="news-detail-title">
            {{ $title }}
        </h1>

        {{-- Image --}}
        @if($news->image)
            <div class="news-detail-image">
                <img
                    src="{{ asset('storage/' . $news->image) }}"
                    alt="{{ $title }}"
                    onerror="this.onerror=null; this.src='{{ asset('images/images.jpg') }}';"
                >
            </div>
        @endif
        {{-- Date --}}
        @if($news->date)
            <div class="news-detail-date">
                {{ $news->date->format('d.m.Y') }}
            </div>
        @endif

        {{-- Short description --}}
        @if($shortDescription)
            <div class="news-detail-short-description">
                {!! $shortDescription !!}
            </div>
        @endif

        {{-- Detailed description --}}
        @if($description)
            <div class="news-detail-description">
                {!! $description !!}
            </div>
        @endif

        {{-- Video --}}
        @if($news->video)
            <div class="news-detail-video">

                <video controls preload="metadata">
                    <source
                        src="{{ asset('storage/' . $news->video) }}"
                        type="video/mp4"
                    >

                    Your browser does not support the video tag.
                </video>

            </div>
        @endif

    </div>

</section>

@endsection
