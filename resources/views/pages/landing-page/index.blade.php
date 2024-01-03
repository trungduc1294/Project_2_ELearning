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
            <div class="nav_group">
                <div class="title">
                    <span>"menu"</span>
                </div>

                <div class="nav_item">
                    <a href="/teacher/courses-detail">
                        <span class="comment">
                            //course-detail
                        </span>
                        <div class="links">
                            <span>"Course" => </span>
                            <p class="nav_name">"Detail"</p>
                        </div>
                    </a>
                </div>

                <div class="nav_item">
                    <a href="/teacher/courses-list">
                    <span class="comment">
                        //teacher
                    </span>
                        <div class="links">
                            <span>"Course" => </span>
                            <p class="nav_name">"Lists"</p>
                        </div>
                    </a>
                </div>

                <div class="nav_item">
                    <a href="#">
                        <span class="comment">
                            //deepdive
                        </span>
                        <div class="links">
                            <span>"browse" => </span>
                            <p class="nav_name">"Series"</p>
                        </div>
                    </a>
                </div>

                <div class="nav_item">
                    <a href="#">
                <span class="comment">
                    //deepdive
                </span>
                        <div class="links">
                            <span>"browse" => </span>
                            <p class="nav_name">"Series"</p>
                        </div>
                    </a>
                </div>

                <div class="nav_item">
                    <a href="#">
                <span class="comment">
                    //deepdive
                </span>
                        <div class="links">
                            <span>"browse" => </span>
                            <p class="nav_name">"Series"</p>
                        </div>
                    </a>
                </div>
            </div>
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
