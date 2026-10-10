@extends('layouts.frontend')

@section('title', __('frontend.projects') . ' | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();
@endphp

<section class="list-page">

    <div class="list-page-container">

        <h1 class="list-page-title">
            {{ __('frontend.projects') }}
        </h1>

        <div class="list-page-grid">

            @foreach($projects as $project)

                @php
                    $title = $project->title[$locale]
                        ?? $project->title['en']
                        ?? '';
                @endphp

                <a href="#" class="list-page-card">

                    @if($project->image)
                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $title }}"
                            loading="lazy"
                        >
                    @endif

                    <div class="list-page-overlay">
                        <h3>{{ $title }}</h3>
                    </div>

                </a>

            @endforeach

        </div>

        <div class="list-page-pagination">
            {{ $projects->links() }}
        </div>

    </div>

</section>

@endsection
