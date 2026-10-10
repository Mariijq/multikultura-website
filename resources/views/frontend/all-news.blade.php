@extends('layouts.frontend')

@section('title', __('frontend.news_media') . ' | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();
@endphp

<section class="list-page">

    <div class="list-page-container">

        <h2 class="list-page-title">
            {{ __('frontend.news_media') }}
        </h2>

        <div class="list-page-grid">

            @foreach($news as $item)

                @php
                    $title = $item->title[$locale]
                        ?? $item->title['en']
                        ?? '';
                @endphp

                <a href="#" class="list-page-card">

                    @if($item->image)
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
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
            {{ $news->links() }}
        </div>

    </div>

</section>

@endsection
