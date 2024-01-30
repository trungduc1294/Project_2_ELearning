@extends('layouts.lesson-layout')

@section('title', 'Lesson Detail')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('std-lesson', [
    'course_id' => $course_id,
    'lesson_id' => $lesson_id
  ])
@stop

@section('scripts')
    <script>
    </script>
@stop
