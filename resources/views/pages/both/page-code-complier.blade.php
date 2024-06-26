@extends('layouts.quiz-layout')

@section('title', 'LearningCast | Code Complier')

@section('style-libraries')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"> --}}
@stop

@section('styles')
@stop

@section('content')
  @livewire('code-complier')
@stop

@section('scripts')
  @vite(['resources/js/editor.js'])
@stop
