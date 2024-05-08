<div class="header">
    <div class="header__logo">
        <a href="{{route('home')}}">
            <h1>LearningCast</h1>
        </a>
    </div>

    @if(session()->has('userId'))
        <div class="header-authed">
            <a class="secondary_button" href="/logout">Đăng Xuất</a>

            <a href="{{ route('account', [session('userId')])}}">
                <div class="header__user">
                    <img src="{{ asset('images/default-avatar.webp') }}" alt="">
                </div>
            </a>
        </div>
    @else
        <div class="header__auth">
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="signin">
                <a href="/login">Đăng nhập</a>
            </div>
            <div class="registration">
                <a href="/signup">Bắt đầu miễn phí</a>
            </div>
        </div>
    @endif

    

</div>
