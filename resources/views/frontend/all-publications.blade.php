@extends('layouts.frontend')

@section('title', __('frontend.publications') . ' | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();
@endphp

<section class="list-page">

    <div class="list-page-container">

        <h1 class="list-page-title">
            {{ __('frontend.publications') }}
        </h1>

        <div class="list-page-grid">

            @foreach($publications as $publication)

                @php
                    $title = $publication->title[$locale]
                        ?? $publication->title['en']
                        ?? '';
                @endphp

                <a href="#" class="list-page-card">

                    @if($publication->image)
                        <img
                            src="{{ asset('storage/' . $publication->image) }}"
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
            {{ $publications->links() }}
        </div>

    </div>

</section>

@endsection