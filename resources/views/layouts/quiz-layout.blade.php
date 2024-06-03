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
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')

    @livewireStyles
</head>
<body class="min-h-[100vh]">
    <div class="background_pattern min-h-[100vh]">
        <div class="background_cover min-h-[100vh]">
            @include('sweetalert::alert')
            @include('partials.header')
            {{-- @include('partials.account_header') --}}

            @yield('content')
        </div>
    </div>

    {{--Scripts js common--}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    {{--Scripts link to file or js custom--}}
    @yield('scripts')

    @livewireScripts

    <script type="text/javascript">
        document.addEventListener('swal', function(evt) {
            console.log('event swal', evt.detail);
            let type = evt.detail.type === 'success' ? 'success' : 'error';
            Swal.fire({
                title: evt?.detail?.title ?? 'Success',
                text: evt?.detail?.message ?? 'successful',
                icon: type,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                padding: '0.5em',
                // background: '#0D1727',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        });
    </script>

    {{-- <script type="text/javascript">
        document.addEventListener('swal-confirm', function(evt) {
        console.log('event swal-confirm', evt.detail);
        Swal.fire({
            title: evt?.detail?.title ?? 'Confirmation',
            text: evt?.detail?.message ?? 'Are you sure?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng xác nhận
                // Gửi sự kiện swal-confirm-confirmed nếu cần
                document.dispatchEvent(new CustomEvent('swal-confirm-confirmed', {
                    detail: {
                        confirmed: true
                    }
                    }));
                }
            });
        });
    </script> --}}
</body>
</html>
