@extends('layouts.quiz-layout')

@section('title', 'LearningCast | Exam')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('list-exam-livewire', [
    'course_id' => $course_id,
  ])
@stop

@section('scripts')
    <script>
    </script>
@stop
