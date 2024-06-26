@extends('layouts.master')

@section('title', 'LearningCast | Quiz Start')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
    <div class="quiz-start">
      <div class="course-icon">
        <img src="https://laracasts.s3.amazonaws.com/series/thumbnails/svg/laravel-from-scratch.svg" alt="">
      </div>
      <div class="course-info">
        <h1>Laravel From Scratch Quiz</h1>
        <p>Heads up! You may take this quiz as many times as you wish, <br> but only the score from your first try will be recorded to your permanent record.</p>
      </div>
      <div class="quiz-start-btn">
        <a href="">Let's Get Started</a>
      </div>
    </div>
@stop

@section('scripts')
    <script>
    </script>
@stop
