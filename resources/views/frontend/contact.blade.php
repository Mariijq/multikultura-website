@extends('layouts.frontend')

@section('title', __('frontend.contact') . ' | Multikultura')

@section('content')

@php
    $locale = app()->getLocale();

    // JSON полињата од моделот Contacts треба да бидат cast-нати во array.
    $localized = function ($value) use ($locale) {
        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $value = $decoded;
            }
        }

        if (is_array($value)) {
            return $value[$locale]
                ?? $value['en']
                ?? reset($value)
                ?: '';
        }

        return $value ?? '';
    };
@endphp

<section class="contact-page">

    <div class="contact-page-container">

        {{-- FORM SECTION --}}
        <div class="contact-form-section">

            <h2 class="contact-page-title">
                {{ __('frontend.leave_message') }}
            </h2>

            <p class="contact-form-description">
                {{ __('frontend.contact_description') }}
            </p>

            @if (session('success'))
                <div class="contact-alert contact-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="contact-alert contact-alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('messages.store') }}"
                method="POST"
                class="contact-form"
            >
                @csrf

                <div class="contact-form-grid">

                    <div class="contact-form-group">
                        <label for="first_name">
                            {{ __('frontend.first_name') }} *
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            required
                            autocomplete="given-name"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="last_name">
                            {{ __('frontend.last_name') }} *
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            required
                            autocomplete="family-name"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="email">
                            {{ __('frontend.email') }} *
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="phone">
                            {{ __('frontend.phone') }}
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="field_of_study">
                            {{ __('frontend.field_of_study') }} *
                        </label>

                        <input
                            type="text"
                            id="field_of_study"
                            name="field_of_study"
                            value="{{ old('field_of_study') }}"
                            required
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="year_of_study">
                            {{ __('frontend.year_of_study') }} *
                        </label>

                        <select
                            id="year_of_study"
                            name="year_of_study"
                            required
                        >
                            <option value="">
                                {{ __('frontend.select_year') }}
                            </option>

                            @foreach ([
                                'first_year' => __('frontend.first_year'),
                                'second_year' => __('frontend.second_year'),
                                'third_year' => __('frontend.third_year'),
                                'fourth_year' => __('frontend.fourth_year'),
                                'master' => __('frontend.master'),
                                'other' => __('frontend.other'),
                            ] as $value => $label)
                                <option
                                    value="{{ $value }}"
                                    @selected(old('year_of_study') === $value)
                                >
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="contact-form-group">
                        <label for="address">
                            {{ __('frontend.address') }} *
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                            required
                            autocomplete="street-address"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="city">
                            {{ __('frontend.city') }} *
                        </label>

                        <input
                            type="text"
                            id="city"
                            name="city"
                            value="{{ old('city') }}"
                            required
                            autocomplete="address-level2"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="country">
                            {{ __('frontend.country') }} *
                        </label>

                        <input
                            type="text"
                            id="country"
                            name="country"
                            value="{{ old('country') }}"
                            required
                            autocomplete="country-name"
                        >
                    </div>

                    <div class="contact-form-group">
                        <label for="zipcode">
                            {{ __('frontend.zipcode') }} *
                        </label>

                        <input
                            type="text"
                            id="zipcode"
                            name="zipcode"
                            value="{{ old('zipcode') }}"
                            required
                            autocomplete="postal-code"
                        >
                    </div>

                    <div class="contact-form-group contact-form-full">
                        <label for="period">
                            {{ __('frontend.preferred_period') }} *
                        </label>

                        <select id="period" name="period" required>
                            <option value="">
                                {{ __('frontend.select_period') }}
                            </option>

                            <option
                                value="fall_semester"
                                @selected(old('period') === 'fall_semester')
                            >
                                {{ __('frontend.fall_semester') }}
                            </option>

                            <option
                                value="spring_semester"
                                @selected(old('period') === 'spring_semester')
                            >
                                {{ __('frontend.spring_semester') }}
                            </option>

                            <option
                                value="summer"
                                @selected(old('period') === 'summer')
                            >
                                {{ __('frontend.summer') }}
                            </option>
                        </select>
                    </div>

                    <div class="contact-form-group contact-form-full">
                        <label for="message">
                            {{ __('frontend.message') }}
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                        >{{ old('message') }}</textarea>
                    </div>

                </div>

                <button type="submit" class="contact-submit-button">
                    {{ __('frontend.send_message') }}
                </button>

            </form>
        </div>

        {{-- CONTACT INFORMATION --}}
        @if (isset($contact) && $contact)
            <div class="contact-info-section">

                <h2 class="contact-page-title">
                    {{ __('frontend.contact_information') }}
                </h2>

                <div class="contact-info-grid">

                    @if ($email = $localized($contact->email))
                        <div class="contact-info-card">
                            <span class="contact-info-icon">
                                <i class="bx bxs-envelope"></i>
                            </span>

                            <div>
                                <h3>{{ __('frontend.email') }}</h3>

                                <a href="mailto:{{ $email }}">
                                    {{ $email }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($phone = $localized($contact->phone))
                        <div class="contact-info-card">
                            <span class="contact-info-icon">
                                <i class="bx bxs-phone"></i>
                            </span>

                            <div>
                                <h3>{{ __('frontend.phone') }}</h3>

                                <a href="tel:{{ $phone }}">
                                    {{ $phone }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($address = $localized($contact->address))
                        <div class="contact-info-card">
                            <span class="contact-info-icon">
                                <i class="bx bxs-map"></i>
                            </span>

                            <div>
                                <h3>{{ __('frontend.address') }}</h3>

                                <p>{{ $address }}</p>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="contact-social-links">

                    @foreach ([
                        'facebook' => 'bx bxl-facebook',
                        'instagram' => 'bx bxl-instagram',
                        'linkedin' => 'bx bxl-linkedin',
                        'youtube' => 'bx bxl-youtube',
                    ] as $network => $icon)

                        @if ($url = $localized($contact->$network))
                            <a
                                href="{{ $url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="{{ ucfirst($network) }}"
                            >
                                <i class="{{ $icon }}"></i>
                            </a>
                        @endif

                    @endforeach

                </div>

                @if ($contact->google_maps_link)
                    <div class="contact-map">
                        <iframe
                            src="{{ $contact->google_maps_link }}"
                            title="{{ __('frontend.contact_map') }}"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen
                        ></iframe>
                    </div>
                @endif

            </div>
        @endif

    </div>

</section>

@endsection
