@extends('layouts.master')

@section('title', 'Course Detail')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  @livewire('login')
@stop

@section('scripts')
  <script>
    // function togglePasswordVisibility() {
    //   var passwordInput = document.getElementById("password");
    //   var showPasswordIcon = document.querySelector(".show-password i");

    //   if (passwordInput.type === "password") {
    //     passwordInput.type = "text";
    //     showPasswordIcon.classList.remove("fa-eye");
    //     showPasswordIcon.classList.add("fa-eye-slash");
    //   } else {
    //     passwordInput.type = "password";
    //     showPasswordIcon.classList.remove("fa-eye-slash");
    //     showPasswordIcon.classList.add("fa-eye");
    //   }
    // }
  </script>
@stop
