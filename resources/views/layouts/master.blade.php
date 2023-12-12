<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Learning")</title>

    {{--Styles css common--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- gsap cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- vite --}}
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

    {{-- alpinejs cdn --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')

    @livewireStyles
</head>
<body>
    <div class="background_pattern">
        <div class="background_cover">
            @include('partials.header')
            {{-- @include('partials.account_header') --}}

            @yield('content')
        </div>
    </div>

    @include('partials.footer')

    {{--Scripts js common--}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    {{--Scripts link to file or js custom--}}
    @yield('scripts')

    @livewireScripts
</body>
</html>
