@extends('layouts.empty-layout')

@section('title', 'Meeting Create')

@section('style-libraries')
@stop

@section('styles')
@stop

@section('content')

  @livewire('teacher-create-meeting-livewire')

@stop

@section('scripts')
  <script src="{{ asset('js/meeting/lobby.js') }}"></script>
@stop
