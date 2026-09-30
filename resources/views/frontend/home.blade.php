@extends('layouts.frontend')

@section('title', 'Home | Multikultura')

@section('content')

@php $locale = app()->getLocale(); @endphp

<section class="home-hero">
    <img src="{{ asset('images/hero.jpg') }}" alt="Multikultura" class="home-hero-image">
</section>

<section class="latest-news">
    <div class="latest-news-container">

        <h2>{{ __('frontend.latest_news') }}</h2>

        <div class="latest-news-grid">

            @foreach($news as $item)
                <a href="#" class="news-card">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title[$locale] ?? $item->title['en'] }}">
                    @endif

                    <div class="news-overlay">
                        <h3>{{ $item->title[$locale] ?? $item->title['en'] }}</h3>
                    </div>
                </a>
            @endforeach

        </div>

        <div class="latest-news-button">
            <a href="#">{{ __('frontend.more_news') }}</a>
        </div>

    </div>
</section>

@endsection