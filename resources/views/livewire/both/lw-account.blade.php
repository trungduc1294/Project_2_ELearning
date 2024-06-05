<div class="account_container pb-20">
    <div class="account_header">
        <div class="title">
            <h1>Cài Đặt Tài Khoản</h1>
            <span>Điều chỉnh thông tin cá nhân của bạn!</span>
        </div>
    </div>

    <div class="account_content pb-10">
        <div class="side">
            <div class="avatar relative">
                <img src="{{ asset('images/default-avatar.webp') }}" alt="">
                <div class="absolute bottom-0 bg-black opacity-40 w-full py-4 rounded-b-lg cursor-pointer">
                    <span class="text-white font-bold pl-10">Change image</span>
                </div>
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
                wire:click='changeStep("ranking")
                '>
                    <div class="before_line"></div>
                    <span>Rank Học Tập</span>
                </div>
                <div class="
                {{ $step == 'process' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("process")
                '>
                    <div class="before_line"></div>
                    <span>Tiến trình học tập</span>
                </div>
                <div class="
                {{ $step == 'score' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("score")
                '>
                    <div class="before_line"></div>
                    <span>Thống kê điểm số</span>
                </div>
                <div class="
                {{ $step == 'leaderboard' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("leaderboard")
                '>
                    <div class="before_line"></div>
                    <span>Bảng xếp hạng</span>
                </div>
                {{-- <div class="
                {{ $step == 'Referral' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Referral")
                '>
                    <div class="before_line"></div>
                    <span>Referral Program</span>
                </div> --}}
                {{-- <div class="
                {{ $step == 'Gift' ? 'side_nav__item active' : 'side_nav__item' }}" 
                wire:click='changeStep("Gift")
                '>
                    <div class="before_line"></div>
                    <span>Gift an Account</span>
                </div> --}}
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
            @if ($step == 'ranking')
                <div class="step_ranking step m-auto">
                    <div class="title">
                        <h1>Ranking chăm chỉ</h1>
                    </div>
                    <div class="rank_img flex flex-col items-center justify-center mt-10">
                        <img class="w-32" src="{{ asset('images/ranking/rank' . $user_rank . '.png') }}">
                        <h1 class="text-white text-lg font-bold mt-2">Rank {{$user_rank}}</h1>
                    </div>
                    <div class="rank_info mt-10">
                        <div class="rank_progress">
                            <div class="progress w-full h-3 bg-slate-400 rounded-lg relative">
                                <div class="progress_bar bg-red-400 absolute h-3 rounded-lg" style="width: {{$progress_bar_percent}}%"></div>
                            </div>
                            <span class="text-white text-md font-bold float-right mt-2">{{$rank_point}} điểm</span>
                        </div>
                    </div>
                </div>
            @endif
            @if ($step == 'leaderboard')
                <div class="step mx-auto pb-10">
                    <div class="title mb-10">
                        <h1>Bảng xếp hạng</h1>
                    </div>
                    
                    <div class="top_ranking mx-auto relative max-w-[600px] pb-10">
                        <div class="top1 top_user_container flex flex-col items-center justify-center absolute left-[230px]">
                            <img src="{{ asset('images/default-avatar.webp') }}" alt="" class="w-32 h-32 rounded-full border-white border-2">
                            <div class="point flex items-center justify-center gap-2 my-1">
                                <span>{{ $top3User[0]->rank_point }} điểm</span>
                                <img src="{{ asset('images/ranking/rank1.png') }}" alt="" class="w-6">
                            </div>
                            <div class="name relative">
                                <img src="{{ asset('images/name-frame.png') }}" alt="" class="w-40">
                                <span class="absolute top-1 left-[16px] text-black font-bold text-lg">1</span>
                                <span class="absolute top-2 left-10 text-white font-semibold max-w-32 line-clamp-1">{{ $top3User[0]->username }}</span>
                            </div>
                        </div>
                        <div class="top2 top_user_container flex flex-col items-center justify-center absolute left-0 top-20">
                            <img src="{{ asset('images/default-avatar.webp') }}" alt="" class="w-32 h-32 rounded-full border-white border-2">
                            <div class="point flex items-center justify-center gap-2 my-1">
                                <span>{{ $top3User[1]->rank_point }} điểm</span>
                                <img src="{{ asset('images/ranking/rank1.png') }}" alt="" class="w-6">
                            </div>
                            <div class="name relative">
                                <img src="{{ asset('images/name-frame.png') }}" alt="" class="w-40">
                                <span class="absolute top-1 left-[16px] text-black font-bold text-lg">2</span>
                                <span class="absolute top-2 left-10 text-white font-semibold max-w-32 line-clamp-1">{{ $top3User[1]->username }}</span>
                            </div>
                        </div>
                        <div class="top3 top_user_container flex flex-col items-center justify-center absolute right-0 top-32">
                            <img src="{{ asset('images/default-avatar.webp') }}" alt="" class="w-32 h-32 rounded-full border-white border-2">
                            <div class="point flex items-center justify-center gap-2 my-1">
                                <span>{{ $top3User[2]->rank_point }} điểm</span>
                                <img src="{{ asset('images/ranking/rank1.png') }}" alt="" class="w-6">
                            </div>
                            <div class="name relative">
                                <img src="{{ asset('images/name-frame.png') }}" alt="" class="w-40">
                                <span class="absolute top-1 left-[16px] text-black font-bold text-lg">3</span>
                                <span class="absolute top-2 left-10 text-white font-semibold max-w-32 line-clamp-1">{{ $top3User[2]->username }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
