@extends('layouts.admin')

@section('title', 'Messages')

@section('content')

<div class="container-fluid messages-page">

    <div class="messages-header">
        <div>
            <h1>Received Messages</h1>
            <p>Manage and review messages submitted through the website.</p>
        </div>

        <div class="messages-count">
            <span class="messages-count-number">{{ $messages->total() }}</span>
            <span class="messages-count-label">Total Messages</span>
        </div>
    </div>

    @if ($messages->isEmpty())

        <div class="messages-empty">
            <div class="messages-empty-icon">
                <i class="fas fa-envelope-open-text"></i>
            </div>

            <h3>No messages yet</h3>
            <p>Messages submitted through the contact form will appear here.</p>
        </div>

    @else

        <div class="messages-grid">

            @foreach ($messages as $message)

                @php
                    $locale = app()->getLocale();

                    $getValue = function ($value) use ($locale) {
                        if (is_string($value)) {
                            $decoded = json_decode($value, true);

                            if (json_last_error() === JSON_ERROR_NONE
                                && is_array($decoded)) {
                                $value = $decoded;
                            }
                        }

                        if (is_array($value)) {
                            return $value[$locale]
                                ?? $value['en']
                                ?? (count($value) ? reset($value) : '');
                        }

                        return $value ?? '';
                    };

                    $periods = [
                        'fall_semester' => 'Fall Semester',
                        'spring_semester' => 'Spring Semester',
                        'summer' => 'Summer',
                    ];

                    $fullName = trim(
                        $getValue($message->first_name) . ' ' .
                        $getValue($message->last_name)
                    );
                @endphp

                <div class="message-card">

                    <div class="message-card-header">
                        <div class="message-avatar">
                            {{ strtoupper(substr($fullName ?: 'M', 0, 1)) }}
                        </div>

                        <div class="message-sender">
                            <h3>{{ $fullName ?: 'Unknown Sender' }}</h3>
                            <span class="message-id">
                                Message #{{ $message->id }}
                            </span>
                        </div>

                        <span class="message-status">
                            <span class="status-dot"></span>
                            Received
                        </span>
                    </div>

                    <div class="message-card-body">

                        <div class="message-info">
                            <span class="message-label">
                                <i class="fas fa-envelope"></i>
                                Email
                            </span>

                            <span class="message-value message-email">
                                {{ $getValue($message->email) ?: '—' }}
                            </span>
                        </div>

                        <div class="message-info">
                            <span class="message-label">
                                <i class="fas fa-graduation-cap"></i>
                                Field of Study
                            </span>

                            <span class="message-value">
                                {{ $getValue($message->field_of_study) ?: '—' }}
                            </span>
                        </div>

                        <div class="message-info">
                            <span class="message-label">
                                <i class="fas fa-calendar-alt"></i>
                                Preferred Period
                            </span>

                            <span class="message-value">
                                {{ $periods[$message->period] ?? $message->period ?? '—' }}
                            </span>
                        </div>

                        <div class="message-info">
                            <span class="message-label">
                                <i class="fas fa-clock"></i>
                                Received On
                            </span>

                            <span class="message-value">
                                {{ $message->created_at?->format('d M Y, H:i') ?? '—' }}
                            </span>
                        </div>

                        @if ($message->message)
                            <div class="message-preview">
                                <span class="message-label">Message</span>
                                <p>{{ \Illuminate\Support\Str::limit($message->message, 120) }}</p>
                            </div>
                        @endif

                    </div>

                    <div class="message-card-footer">
                        <span class="message-footer-date">
                            <i class="far fa-calendar"></i>
                            {{ $message->created_at?->format('d.m.Y') ?? '—' }}
                        </span>

                        <a
                            href="{{ route('admin.messages.show', $message) }}"
                            class="message-view-btn"
                        >
                            View Details
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                </div>

            @endforeach

        </div>

        <div class="messages-pagination">
            {{ $messages->links() }}
        </div>

    @endif

</div>

@endsection
