<div class="discussion_detail">
    <div class="discussion">
        <div class="user_info">
            <img src="{{ asset('images/default-avatar.webp') }}" alt="">
            <span>
                {{ $discussion->user_id }}
            </span>
            <div class="rank">
                <img src="{{ asset('images/ranking/rank1.png') }}" alt="">
                <span>Rank 1</span>
            </div>
        </div>
        <div class="discussion_info">
            <div class="header">
                <h1 class="title">{{ $discussion->title }}</h1>
                <div class="general_info">
                    <div class="view" wire:click='likeDiscussion'>
                        <i class="fa-solid fa-heart text-red-500 cursor-pointer"></i>
                        <span>{{ $discussion->likes }}</span>
                    </div>
                    <div class="comment">
                        <i class="fa-regular fa-comment"></i>
                        <span>{{ $discussion->comments }}</span>
                    </div>
                    <div class="category">
                        <span>{{ $discussion->category_id }}</span>
                    </div>
                </div>

            </div>
            <div class="content_box">
                <pre class="content">
                    {{ $discussion->content }}
                </pre>
            </div>
        </div>
    </div>

    <div class="reply">
        <h1 class="title">Bình luận</h1>
        <form wire:submit.prevent='addComment'>
            <input type="text" name="comment" id="comment" wire:model='newComment' placeholder="Thêm câu trả lời...">
            <button type="submit">Post</button>
        </form>
        <div class="list_comment">

            @if ($allComment)
                @foreach ($allComment as $item)
                <div class="comment_item">
                    <div class="user_info">
                        <img src="{{ asset('images/default-avatar.webp') }}" alt="">
                        <span>
                            {{ $item->user_name }}
                        </span>
                        <div class="rank">
                            <img src="{{ asset('images/ranking/rank1.png') }}" alt="">
                            <span>Rank 1</span>
                        </div>
                    </div>
                    <div class="comment_info">
                        <p class="content">
                            {{ $item->content }}
                        </p>
                    </div>
                </div>
                @endforeach
            @endif

            

            
        </div>
    </div>
</div>
