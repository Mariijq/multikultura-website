@extends('layouts.admin')

@section('title', 'About Us | Multikultura')

@push('styles')
    @vite('resources/css/admindashboard.css')
    <x-rich-text::styles />
@endpush

@push('scripts')
    @vite('resources/js/dashboard.js')
@endpush

@section('content')



@endsection