@extends('layouts.quiz-layout')

@section('title', 'LearningCast | Quiz')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
@stop 

@section('styles')
@stop

@section('content')
    @livewire('std-quiz', [
      'course_id' => $course_id,
      'lesson_id' => $lesson_id,
    ]);
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function initSlide()
        {
            const swiper = new Swiper('.swiper', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,
                
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },
                
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                
                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initSlide();
        });
        document.addEventListener('selected:answer', function (event) {
            console.log(event, event.detail)
            setTimeout(() => {
                initSlide();
            }, 200);
        })
    </script>
@stop
