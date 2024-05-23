@extends('layouts.master')

@section('title', 'Diễn Đàn')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('forum-livewire')
@stop

@section('scripts')
    <script>
    </script>
@stop
