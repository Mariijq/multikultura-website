@extends('layouts.frontend')

@section('title', 'About Us | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();
@endphp

<section class="about-page">

    <div class="about-page-container">

        @if($about)

            {{-- WHO WE ARE --}}
            <div class="about-page-section">

                <h2>
                    {{ __('frontend.who_we_are') }}
                </h2>

                <div class="about-page-content">
                    {!! $about->who_we_are[$locale] ?? $about->who_we_are['en'] ?? '' !!}
                </div>

            </div>


            {{-- WHAT WE OFFER --}}
            <div class="about-page-section">

                <h2>
                    {{ __('frontend.what_we_offer') }}
                </h2>

                <div class="about-page-content">
                    {!! $about->what_we_offer[$locale] ?? $about->what_we_offer['en'] ?? '' !!}
                </div>

            </div>


            {{-- VISION --}}
            <div class="about-page-section">

                <h2>
                    {{ __('frontend.vision') }}
                </h2>

                <div class="about-page-content">
                    {!! $about->vision[$locale] ?? $about->vision['en'] ?? '' !!}
                </div>

            </div>


            {{-- MISSION --}}
            <div class="about-page-section">

                <h2>
                    {{ __('frontend.mission') }}
                </h2>

                <div class="about-page-content">
                    {!! $about->mission[$locale] ?? $about->mission['en'] ?? '' !!}
                </div>

            </div>

        @endif

    </div>

</section>

@endsection
