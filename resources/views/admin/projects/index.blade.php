@extends('layouts.admin')

@section('title', 'Projects | Multikultura')

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

@section('content')

<div class="head-title">
    <div class="left">
        <h1>Projects</h1>

        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>

            <li>
                <i class='bx bx-chevron-right'></i>
            </li>

            <li>
                <span class="text">Projects</span>
            </li>
        </ul>
    </div>
</div>

<div class="dashboard-container">

    <div class="actions">
        <a href="{{ route('admin.projects.create') }}" class="save-button">
            <i class='bx bx-plus'></i>
            Add Project
        </a>
    </div>

    <div class="dashboard-card">
        {!! $dataTable->table([
            'id' => 'projects-table',
            'class' => 'display'
        ]) !!}
    </div>

</div>

@endsection