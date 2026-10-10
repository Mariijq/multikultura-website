@extends('layouts.admin')

@section('title', 'Message Details | Multikultura')

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Message Details</h1>

        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <a href="{{ route('admin.messages.index') }}">Messages</a>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <span class="text">Message Details</span>
            </li>
        </ul>
    </div>
</div>

<div class="dashboard-container">

    <div class="dashboard-card">

        <div class="dashboard-card-header">
            <div>
                <h2>
                    {{ $message->first_name }}
                    {{ $message->last_name }}
                </h2>

                <span class="section-label">
                    Received:
                    {{ $message->created_at?->format('d.m.Y H:i') ?? 'N/A' }}
                </span>
            </div>
        </div>

        <div class="form-group">
            <label>First Name</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->first_name }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->last_name }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->email }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->phone ?? 'Not provided' }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Field of Study</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->field_of_study }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Year of Study</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->year_of_study }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Address</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->address }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>City</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->city }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Country</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->country }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>ZIP Code</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->zipcode }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Preferred Period</label>
            <input
                type="text"
                class="form-control"
                value="{{ $message->period }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea
                class="form-control"
                rows="6"
                readonly
            >{{ $message->message ?? 'No additional message.' }}</textarea>
        </div>

<div class="actions message-detail-actions">

    <a href="{{ route('admin.messages.index') }}"
       class="cancel-button message-back-btn">
        <i class="bi bi-arrow-left"></i>
        <span>Back to Messages</span>
    </a>

    <form
        method="POST"
        action="{{ route('admin.messages.destroy', $message->id) }}"
        class="delete-form"
        data-title="{{ $message->first_name }} {{ $message->last_name }}"
    >
        @csrf
        @method('DELETE')

        <button type="submit" class="message-delete-submit">
            <i class="bi bi-trash3"></i>
            <span>Delete Message</span>
        </button>
    </form>

    </div>

    </div>

</div>

@endsection
