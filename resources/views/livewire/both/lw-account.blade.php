<div class="account_container">
    <div class="account_header">
        <div class="title">
            <h1>Cài Đặt Tài Khoản</h1>
            <span>Điều chỉnh thông tin cá nhân của bạn!</span>
        </div>
    </div>

    <div class="account_content">
        <div class="side">
            <div class="avatar">
                <img src="{{ asset('images/default-avatar.webp') }}" alt="">
            </div>
            <div class="side_nav">
                <div class="
                {{ $step == 'account' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("account")
                '>
                    <div class="before_line"></div>
                    <span>Chung</span>
                </div>
                <div class="
                {{ $step == 'profile' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("profile")
                '>
                    <div class="before_line"></div>
                    <span>Thông Tin Tài Khoản</span>
                </div>
                <div class="
                {{ $step == 'Preferences' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Preferences")
                '>
                    <div class="before_line"></div>
                    <span>Site Preferences</span>
                </div>
                <div class="
                {{ $step == 'Payment' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Payment")
                '>
                    <div class="before_line"></div>
                    <span>Payment and Invoices</span>
                </div>
                <div class="
                {{ $step == 'Notifications' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Notifications")
                '>
                    <div class="before_line"></div>
                    <span>Notifications</span>
                </div>
                <div class="
                {{ $step == 'Stats' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Stats")
                '>
                    <div class="before_line"></div>
                    <span>Stats</span>
                </div>
                <div class="
                {{ $step == 'Referral' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Referral")
                '>
                    <div class="before_line"></div>
                    <span>Referral Program</span>
                </div>
                <div class="
                {{ $step == 'Gift' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Gift")
                '>
                    <div class="before_line"></div>
                    <span>Gift an Account</span>
                </div>
            </div>
        </div>

        <div class="main_content">
            {{-- step Account --}}
            @if ($step == 'account')
                <div class="step_account">
                    <div class="title">
                        <h1>Cập nhật thông tin tài khoản.</h1>
                    </div>

                    <form class="account_form form_container" wire:submit.prevent='updateAccount'>
                        <div class="form_group">
                            <label for="username">Tên người dùng</label>
                            <input type="text" id="username" placeholder="Username" wire:model='username'>
                        </div>
                        <div class="form_group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email" wire:model='email'>
                        </div>
                        <div class="form_group">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" id="password" placeholder="password" wire:model='password'>
                        </div>
                        <button type="submit">Cập Nhật</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
