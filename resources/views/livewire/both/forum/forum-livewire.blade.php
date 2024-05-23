<div class="forum w-2/3 mx-auto">
    <div class="forum_header">
        <div class="filter">
            <select name="category" id="category" class="category_filter">
                <option value="0">Tất cả</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select name="class" id="class" class="class_filter">
                <option value="0">Tất cả</option>
                <option value="1">Lớp 10</option>
                <option value="2">Lớp 11</option>
                <option value="3">Lớp 12</option>
                <option value="4">Khác</option>
            </select>
        </div>
        <div class="search_box">
            <input type="text" name="search" id="search" placeholder="Tìm kiếm">
            <button class="search_btn">Tìm kiếm</button>
        </div>
    </div>
    <div class="forum_container">
        @if (session()->has('error'))
            <div class="error text-red-400">
                <span>{{ session('error') }}</span>
            </div>
        @endif
        <div class="add_discussion">
            <form wire:submit.prevent='addDiscussion'>
                <div class="title">
                    <input type="text" name="title" id="title" wire:model='discussion_title' placeholder="Thêm tiêu đề">
                    <select name="category" id="category" wire:model='disscussion_category_id'>
                        <option value="0">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <select name="class" id="class" wire:model='disscussion_class'>
                        <option value="0">Chọn lớp</option>
                        <option value="1">Lớp 10</option>
                        <option value="2">Lớp 11</option>
                        <option value="3">Lớp 12</option>
                        <option value="4">Khác</option>
                    </select>
                </div>
                <textarea name="content" id="content" cols="30" rows="10" wire:model='discussion_content' placeholder="Nội dung"></textarea>
                
                
                <input type="submit" value="Đăng bài">
            </form>
        </div>
        <div class="list_discussion">
            
            @if ($discussion_list)
                @foreach ($discussion_list as $item)
                <div class="discussion">
                    <div class="user_info">
                        <img src="{{ asset('images/default-avatar.webp') }}" alt="">
                        <span>
                            {{ $item->user_id }}
                        </span>
                        <div class="rank">
                            <img src="{{ asset('images/ranking/rank1.png') }}" alt="">
                            <span>Rank 1</span>
                        </div>
                    </div>
                    <div class="discussion_info">
                        <div class="header">
                            <h1 class="title">{{$item->title}}</h1>
                            <div class="general_info">
                                <div class="view">
                                    <i class="fa-solid fa-eye"></i>
                                    <span>{{$item->likes}}</span>
                                </div>
                                <div class="comment">
                                    <i class="fa-regular fa-comment"></i>
                                    <span>{{$item->comments}}</span>
                                </div>
                                <div class="category">
                                    <span>{{$item->category_id}}</span>
                                </div>
                            </div>
    
                        </div>
                        <div class="content_box">
                            <p class="content">
                                {{$item->content}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
