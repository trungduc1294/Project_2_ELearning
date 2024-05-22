@extends('layouts.master')

@section('title', 'Landing Page')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
    <div class="landing-page__content">
        <div class="title landing-page__title">
            <h1>Learn on your schedule</h1>
            <h2>Start Here...</h2>
        </div>
        <div class="navigation_tab">
            @if (session('role') == 'teacher')
                @livewire('teacher-menu')
            @elseif (session('role') == 'student')
                @livewire('student-menu')
            @elseif (session('role') == 'headmaster')
                @livewire('headmaster-menu')
            @else
                @livewire('guest-menu')
            @endif
        </div>
    </div>

    <img class="landing-page__illustration" src="{{asset("/images/home-banner-illustration.svg")}}" alt="illustration">

@stop

@section('scripts')
    <script>
        gsap.from('.header__logo', {duration: 2, opacity: 0, y: 0 });
        gsap.from('.landing-page__title', {duration: 2, opacity: 0, x: -50});
        gsap.from('.landing-page__illustration', {duration: 1, opacity: 0, y: 50, ease: 'bounce'});
        gsap.from('.navigation_tab', {duration: 2, opacity: 0, x: 30});
    </script>
@stop
