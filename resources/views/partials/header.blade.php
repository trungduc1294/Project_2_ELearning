<div class="header">
    <div class="header__logo">
        <h1>LearningCast</h1>
    </div>

    @if(session()->has('userId'))
        <a class="secondary_button" href="/logout">Logout</a>
    @else
        <div class="header__auth">
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="signin">
                <a href="/login">Sign in</a>
            </div>
            <div class="registration">
                <a href="/signup">Get started for free</a>
            </div>
        </div>
    @endif

    

</div>
