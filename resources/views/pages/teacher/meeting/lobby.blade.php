@extends('layouts.empty-layout')

@section('title', 'LearningCast | Meeting')

@section('style-libraries')
@stop

@section('styles')
@stop

@section('content')

<main id="room__lobby__container">
    
  <div id="form__container">
      <div id="form__container__header">
          <p>👋 Tạo phòng học mới hoặc tham gia phòng học</p>
      </div>

      <form id="lobby__form">

          <div class="form__field__wrapper">
              <label>Tên hiển thị</label>
              <input type="text" name="name" required placeholder="Enter your display name..." />
          </div>

          <div class="form__field__wrapper">
              <label>Tên phòng</label>
              <input type="text" name="room" placeholder="Enter room name..." />
          </div>

          <div class="form__field__wrapper">
              <button type="submit">Tham gia
                  {{-- arow icon --}}
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path
                          d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z" />
                  </svg>
              </button>
          </div>
      </form>
  </div>
</main>

@stop

@section('scripts')
  <script src="{{ asset('js/meeting/lobby.js') }}"></script>
@stop
