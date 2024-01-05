@extends('layouts.master')

@section('title', 'Quiz Manage')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('student-manage', [
    'course_id' => $course_id,
  ])
@stop

@section('scripts')
    <script>
    </script>
@stop
