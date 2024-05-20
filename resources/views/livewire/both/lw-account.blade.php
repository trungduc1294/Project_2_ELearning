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
                {{ $step == 'ranking' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Preferences")
                '>
                    <div class="before_line"></div>
                    <span>Rank Học Tập</span>
                </div>
                <div class="
                {{ $step == 'process' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Payment")
                '>
                    <div class="before_line"></div>
                    <span>Tiến trình học tập</span>
                </div>
                <div class="
                {{ $step == 'score' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Notifications")
                '>
                    <div class="before_line"></div>
                    <span>Thống kê điểm số</span>
                </div>
                <div class="
                {{ $step == 'leaderboard' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Stats")
                '>
                    <div class="before_line"></div>
                    <span>Bảng xếp hạng</span>
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
                <div class="step_account step">
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
            @if ($step == 'profile')
                <div class="step_profile step">
                    <div class="title">
                        <h1>Cập nhật thông tin người dùng.</h1>
                    </div>

                    <form class="account_form form_container" wire:submit.prevent='updateProfile'>
                        <div class="form_group">
                            <label for="name">Họ và tên</label>
                            <input type="text" id="name" placeholder="Nguyễn Văn A" wire:model='name'>
                        </div>
                        <div class="form_group">
                            <label for="phone">Số điện thoại</label>
                            <input type="phone" id="phone" placeholder="0xxxxxxxxx" wire:model='phone'>
                        </div>
                        <div class="form_group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" id="address" placeholder="Thôn x, Xã y" wire:model='address'>
                        </div>
                        <div class="form_group">
                            <label for="class">Lớp</label>
                            <input type="class" id="class" placeholder="10A2" wire:model='class'>
                        </div>
                        <button type="submit">Cập Nhật</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
