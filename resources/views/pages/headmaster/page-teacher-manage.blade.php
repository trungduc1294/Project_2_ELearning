@extends('layouts.quiz-layout')

@section('title', 'LearningCast | Teacher Manage')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('headmaster-manage-teacher')
@stop

@section('scripts')
    <script>
    </script>
@stop
