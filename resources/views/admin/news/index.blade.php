@extends('layouts.admin')

@section('title', 'News | Multikultura')

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

@section('content')

<div class="head-title">
    <div class="left">
        <h1>News</h1>

        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <span class="text">News</span>
            </li>
        </ul>
    </div>
</div>

<div class="dashboard-container">

    <div class="actions">
        <a href="{{ route('admin.news.create') }}" class="save-button">
            <i class='bx bx-plus'></i>
            Add News
        </a>
    </div>

    <div class="dashboard-card">
        {!! $dataTable->table([
            'id' => 'news-table',
            'class' => 'display'
        ]) !!}
    </div>

</div>

@endsection