@extends('layouts.master')

@section('title', 'Bài viết')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('discussion-livewire', [
    'id' => $id,
  ])
@stop

@section('scripts')
    <script>
    </script>
@stop
