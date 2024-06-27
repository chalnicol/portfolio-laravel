@extends('layout.main-layout')

@section('title', 'Portfolio Website')


@section('content')

    @include('components.about')

    @include('components.recentWork')

    @include('components.skills')

    @include('components.workExperience')

@endsection

@section('scripts')

    <script src="{{ asset('assets/js/nav.js')}}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    
@endsection
