@extends('layouts.frontend')

@section('title', 'Home | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();
@endphp


{{-- =====================================================
     HERO
====================================================== --}}

@if($about?->hero_image)

    <section class="home-hero">

        <img
            src="{{ asset('storage/' . $about->hero_image) }}"
            alt="Multikultura"
            class="home-hero-image"
        >

    </section>

@endif


{{-- =====================================================
     LATEST NEWS
====================================================== --}}

<section class="latest-news">

    <div class="latest-news-container">

        <h2>
            {{ __('frontend.latest_news') }}
        </h2>

        <div class="latest-news-grid">

            @foreach($news as $item)

                <a
                    href="{{ route('frontend.news-detail', $item->id) }}"
                    class="news-card"
                >

                    @if($item->image)

                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title[$locale] ?? $item->title['en'] }}"
                            onerror="this.onerror=null; this.src='{{ asset('images/images.jpg') }}';"
                        >

                    @endif

                    <div class="news-overlay">

                        <h3>
                            {{ $item->title[$locale] ?? $item->title['en'] }}
                        </h3>

                    </div>

                </a>

            @endforeach

        </div>

        <div class="latest-news-button">

            <a href="{{ route('frontend.all-news') }}">
                {{ __('frontend.more_news') }}
            </a>

        </div>

    </div>

</section>


{{-- =====================================================
     ABOUT
====================================================== --}}

<section class="about-section">

    <div class="about-container">

        <div class="about-card">

            <h2>
                {{ __('frontend.who_we_are') }}
            </h2>

            <p>
                {!! $about->who_we_are[$locale] ?? $about->who_we_are['en'] ?? '' !!}
            </p>

        </div>


        <div class="about-card">

            <h2>
                {{ __('frontend.what_we_offer') }}
            </h2>

            <p>
                {!! $about->what_we_offer[$locale] ?? $about->what_we_offer['en'] ?? '' !!}
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     PROJECTS
====================================================== --}}

<section class="projects-section">

    <div class="projects-container">

        <h2>
            {{ __('frontend.projects') }}
        </h2>

        <div class="projects-grid">

            @foreach($projects as $project)

                <a
                    href="{{ route('frontend.projects-detail', $project->id) }}"
                    class="project-card"
                >

                    @if($project->image)

                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title[$locale] ?? $project->title['en'] }}"
                        >

                    @endif

                    <div class="project-overlay">

                        <h3>
                            {{ $project->title[$locale] ?? $project->title['en'] }}
                        </h3>

                    </div>

                </a>

            @endforeach

        </div>

        <div class="projects-button">

            <a href="{{ route('frontend.all-projects') }}">
                {{ __('frontend.more_projects') }}
            </a>

        </div>

    </div>

</section>

@endsection