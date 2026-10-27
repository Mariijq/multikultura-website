@extends('layouts.frontend')

@section('title')
    {{ __('frontend.search') }} | Multikultura
@endsection

@section('content')

@php
    $locale = app()->getLocale();
@endphp

<section class="search-page">

    <div class="search-page-container">

        <h1 class="search-page-title">
            {{ __('frontend.search') }}
        </h1>

        {{-- SEARCH FORM --}}

        <form
            action="{{ route('frontend.search') }}"
            method="GET"
            class="search-page-form"
        >

            <input
                type="text"
                name="search"
                value="{{ $query }}"
                placeholder="{{ __('frontend.search') }}"
                autocomplete="off"
                aria-label="{{ __('frontend.search') }}"
            >

            <button type="submit">
                <i class="bx bx-search"></i>
                {{ __('frontend.search') }}
            </button>

        </form>


        {{-- RESULTS --}}

        @if($query !== '')

            <div class="search-page-results">

                <p class="search-page-result-text">
                    {{ __('frontend.search_results_for') }}

                    <strong>
                        "{{ $query }}"
                    </strong>
                </p>


                {{-- NEWS --}}

                @if($news->count())

                    <div class="search-result-section">

                        <h2>
                            {{ __('frontend.news_media') }}
                        </h2>

                        <div class="search-result-grid">

                            @foreach($news as $item)

                                @php
                                    $title = $item->title[$locale]
                                        ?? $item->title['en']
                                        ?? $item->title['mk']
                                        ?? '';
                                @endphp

                                <a
                                    href="{{ route('frontend.news-detail', $item->id) }}"
                                    class="search-result-card"
                                >

                                    @if($item->image)

                                        <img
                                            src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $title }}"
                                            loading="lazy"
                                        >

                                    @endif

                                    <div class="search-result-card-content">

                                        <h3>
                                            {{ $title }}
                                        </h3>

                                        @if($item->date)

                                            <span>
                                                {{ \Carbon\Carbon::parse($item->date)->format('d.m.Y') }}
                                            </span>

                                        @endif

                                    </div>

                                </a>

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- PROJECTS --}}

                @if($projects->count())

                    <div class="search-result-section">

                        <h2>
                            {{ __('frontend.projects') }}
                        </h2>

                        <div class="search-result-grid">

                            @foreach($projects as $project)

                                @php
                                    $title = $project->title[$locale]
                                        ?? $project->title['en']
                                        ?? $project->title['mk']
                                        ?? '';
                                @endphp

                                <a
                                    href="{{ route('frontend.projects-detail', $project->id) }}"
                                    class="search-result-card"
                                >

                                    @if($project->image)

                                        <img
                                            src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $title }}"
                                            loading="lazy"
                                        >

                                    @endif

                                    <div class="search-result-card-content">

                                        <h3>
                                            {{ $title }}
                                        </h3>

                                        @if($project->date)

                                            <span>
                                                {{ \Carbon\Carbon::parse($project->date)->format('d.m.Y') }}
                                            </span>

                                        @endif

                                    </div>

                                </a>

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- PUBLICATIONS --}}

                @if($publications->count())

                    <div class="search-result-section">

                        <h2>
                            {{ __('frontend.publications') }}
                        </h2>

                        <div class="search-result-grid">

                            @foreach($publications as $publication)

                                @php
                                    $title = $publication->title[$locale]
                                        ?? $publication->title['en']
                                        ?? $publication->title['mk']
                                        ?? '';
                                @endphp

                                <a
                                    href="{{ route('frontend.publications-detail', $publication->id) }}"
                                    class="search-result-card"
                                >

                                    @if($publication->image)

                                        <img
                                            src="{{ asset('storage/' . $publication->image) }}"
                                            alt="{{ $title }}"
                                            loading="lazy"
                                        >

                                    @endif

                                    <div class="search-result-card-content">

                                        <h3>
                                            {{ $title }}
                                        </h3>

                                        @if($publication->date)

                                            <span>
                                                {{ \Carbon\Carbon::parse($publication->date)->format('d.m.Y') }}
                                            </span>

                                        @endif

                                    </div>

                                </a>

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- NO RESULTS --}}

                @if(
                    $news->isEmpty() &&
                    $projects->isEmpty() &&
                    $publications->isEmpty()
                )

                    <div class="search-no-results">

                        <i class="bx bx-search-alt"></i>

                        <p>
                            {{ __('frontend.no_search_results') }}
                        </p>

                    </div>

                @endif

            </div>

        @endif

    </div>

</section>

@endsection