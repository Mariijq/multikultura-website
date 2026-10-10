@extends('layouts.frontend')

@section('title', __('frontend.partners') . ' | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();
@endphp

<section class="list-page">

    <div class="list-page-container">

        <h2 class="list-page-title">
            {{ __('frontend.partners') }}
        </h2>

        <div class="list-page-grid">

            @foreach($partners as $partner)

                @php
                    $name = $partner->name[$locale]
                        ?? $partner->name['en']
                        ?? $partner->name['mk']
                        ?? '';
                @endphp

                <div class="list-page-card">

                    @if($partner->image)
                        <img
                            src="{{ asset('storage/' . $partner->image) }}"
                            alt="{{ $name }}"
                            loading="lazy"
                        >
                    @endif

                    <div class="list-page-overlay">

                        <h3>{{ $name }}</h3>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="list-page-pagination">
            {{ $partners->links() }}
        </div>

    </div>

</section>

@endsection
