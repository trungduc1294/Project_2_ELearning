@extends('layouts.empty-layout')

@section('title', 'Join Meeting Room')

@section('style-libraries')
@stop

@section('styles')
@stop

@section('content')

  @livewire('teacher-join-room-livewire', [
    'course_id' => $course_id,
  ]) 

@stop

@section('scripts')
  <script src="{{ asset('js/meeting/agora-rtm-sdk-1.5.1.js') }}"></script>
  <script src="{{ asset('js/meeting/AgoraRTC_N-4.14.2.js') }}"></script>
  <script src="{{ asset('js/meeting/room_rtc.js') }}"></script>
  <script src="{{ asset('js/meeting/room_rtm.js') }}"></script>
  <script src="{{ asset('js/meeting/room_rtc.js') }}"></script>
@stop
