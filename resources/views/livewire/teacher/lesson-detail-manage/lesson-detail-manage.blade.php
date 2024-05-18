<div class="lesson-detail-container" x-cloak x-data="{
    openDescriptionPanel: false,
    openVideoPanel: false,
}">

    {{-- Side --}}
    <div class="side">

        <div class="side-nav">
            <div class="back">
                <i class="fa-solid fa-angle-left"></i>
                <a href="{{ route('teacher.course.detail', [
                    'id' => $course['id'],
                ]) }}">Quay lại khóa học</a>
            </div>
        </div>

        <div class="course-info-container">
            <div class="course-title">
                <h3>{{$course->name}}</h3>
            </div>
            <div class="course-info">
                <div class="lessons item">
                    <i class="fa-solid fa-book"></i>
                    <span>{{$course->number_of_lessons ?? 0}} Bài giảng</span>
                </div>
                <div class="duration item">
                    <i class="fa-solid fa-clock"></i>
                    <span>{{$course->duration ?? 0}}</span>
                </div>
            </div>
        </div>

        <div class="lesson-list">
            @if ($lessonList)
                @foreach ($lessonList as $lesson_item)
                    @if ($lesson_item->id == $lesson_id)
                        <div class="lesson lesson-active">
                            <div class="number">
                                <span>{{$loop->index + 1}}</span>
                            </div>
                            <div class="content">
                                <div class="lesson-title">
                                    <h4>{{$lesson_item->name}}</h4>
                                </div>
                                <div class="lesson-info">
                                    <div class="lesson-number item">
                                        <span>Bài {{$loop->index + 1}}</span>
                                    </div>
                                    <div class="lesson-duration item">
                                        <i class="fa-solid fa-clock"></i>
                                        <span>45m</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="lesson"
                            onclick="window.location.href = '{{ route('teacher.lesson.detail', [
                                'id' => $course_id,
                                'lesson_id' => $lesson_item->id,
                            ]) }}'"
                        >
                            <div class="number">
                                <span>{{$loop->index + 1}}</span>
                            </div>
                            <div class="content">
                                <div class="lesson-title">
                                    <h4>{{$lesson_item->name}}</h4>
                                </div>
                                <div class="lesson-info">
                                    <div class="lesson-number item">
                                        <span>Episode {{$loop->index + 1}}</span>
                                    </div>
                                    <div class="lesson-duration item">
                                        <i class="fa-solid fa-clock"></i>
                                        <span>45m</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                @endforeach
            @endif
        </div>
    </div>


    {{-- Main content --}}
    <div class="lesson-content" >

        

        @if ($lesson->video_url)
            <div class="video-container">
                <video width="100%" controls>
                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @else
            <div class="video-container">
                {{-- <video src="https://www.youtube.com/watch?v=KAYny6V1rB0&pp=ygURU2VsZWN0aW5nIGEgU3RhY2s%3D"></video> --}}
                <img src="{{asset("images/quiz-logo.jpg")}}" alt="">
            </div>
        @endif

        {{-- direction --}}
        <div class="direction">
            <div class="update-video-btn" x-on:click="openVideoPanel = !openVideoPanel;">
                <i class="fa-solid fa-video mr-2"></i>
                <span class="btn btn-primary">Thêm video bài giảng</span>
            </div>
            <div class="quiz-manage direction-btn">
                <i class="fa-solid fa-circle-question"></i>
                <a href="{{route('teacher.quiz.manage', [
                    'course_id' => $course_id,
                    'lesson_id' => $lesson_id,
                ])}}">Quản lý bài tập</a>
            </div>
        </div>

        {{-- lesson description --}}
        <div class="lesson-description">
            <div class="content">
                <h1 class="title">{{$lesson->name}}</h1>
                <p class="content">{{$lesson->description}}</p>
            </div>
            <div class="update"  x-on:click="openDescriptionPanel = !openDescriptionPanel;">
                <i class="fa-solid fa-pencil"></i>
            </div>
        </div>

        {{-- comment section --}}
        <div class="discussion">
            <div class="add-reply">
                <img class="avatar" src="{{asset("images/default-avatar.webp")}}" alt="defaulf-avt">
                <form class="reply-form" wire:submit.prevent='storeAddComment'>
                    <input type="text" placeholder="Thêm bình luận mới ..." wire:model="addComment">
                    <button type="submit">Bình luận</button>
                </form>
            </div>
            <div class="reply-list">
                @if ($listComment)
                    @foreach ($listComment as $comment)
                        <div class="reply">
                            <div class="user-avatar">
                                <img src="{{asset("images/default-avatar.webp")}}" alt="">
                            </div>
                            <div class="content">
                                <h3 class="username">{{$comment->user_name}}</h3>
                                <p class="reply-content">
                                    {{$comment->comment_content}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    {{-- update description panel --}}
    <div class="panel-container update-description-panel" x-show="openDescriptionPanel">
        <div class="panel" @click.outside="openDescriptionPanel = false">
            <h1>Cập Nhật Thông Tin Bài Giảng</h1>
            <form wire:submit.prevent='updateLessonInfo'>
                <div class="form-group">
                    <label for="name">Tên bài giảng:</label>
                    <input type="text" name="name" id="name" wire:model='lessonName'>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <input type="text" name="description" id="description" wire:model='lessonDescription'>
                </div>
                <div class="submit">
                    <button type="submit" x-on:click="openDescriptionPanel = false">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

    {{-- update VIDEO panel --}}
    <div class="panel-container update-video-panel" x-show="openVideoPanel">
        <div class="panel" @click.outside="openVideoPanel = false">
            <h1>Cập nhật video bài giảng</h1>
            <form wire:submit.prevent='uploadVideo'>
                <div class="form-group">
                    <label for="video">Tải lên video:</label>
                    <input wire:model='video' type="file" name="video" id="video">
                </div>
                
                <div class="submit">
                    <button type="submit">Cập nhật</button>
                </div>

                @if ($video)
                    <div wire:loading wire:target="video">Uploading...</div>
                    <div wire:loading.remove wire:target="video">{{ $video->getClientOriginalName() }}</div>
                @endif
            </form>
        </div>
    </div>
    
</div>

