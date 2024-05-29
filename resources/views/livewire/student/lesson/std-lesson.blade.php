<div class="lesson-detail-container">

    {{-- Side --}}
    <div class="side">

        <div class="side-nav">
            <div class="back">
                <i class="fa-solid fa-angle-left"></i>
                <a href="{{ route('student.course.detail', [
                    'student_id' => $student_id,
                    'course_id' => $course_id,
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
                    <span>{{$course->number_of_lessons ?? 0}} Bài Giảng</span>
                </div>
                <div class="duration item">
                    <i class="fa-solid fa-clock"></i>
                    <span>{{$course->duration ?? "0h"}}</span>
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
                                <div class="lesson-title line-clamp-1">
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
                    @else
                        <div class="lesson"
                            onclick="window.location.href = '{{ route('student.lesson.detail', [
                                'course_id' => $course_id,
                                'lesson_id' => $lesson_item->id,
                            ]) }}'"
                        >
                            <div class="number">
                                <span>{{$loop->index + 1}}</span>
                            </div>
                            <div class="content">
                                <div class="lesson-title line-clamp-1">
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
                <video id='videoPlayer' width="100%" controls>
                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @else
            <div class="video-container">
                {{-- <video src="https://www.youtube.com/watch?v=KAYny6V1rB0&pp=ygURU2VsZWN0aW5nIGEgU3RhY2s%3D"></video> --}}
                <img src="{{asset("images/logo.jpg")}}" alt="">
            </div>
        @endif

        {{-- direction --}}
        <div class="direction" wire:click='doExercise'>
            <div class="quiz-manage direction-btn">
                <i class="fa-solid fa-circle-question"></i>
                {{-- <a href="{{route('teacher.quiz.manage', [
                    'course_id' => $course_id,
                    'lesson_id' => $lesson_id,
                ])}}">Quiz manage</a> --}}
                <a href="{{route('student.quiz.manage', [
                    'course_id' => $course_id,
                    'lesson_id' => $lesson_id,
                ])}}">Bài tập</a>
            </div>
            <div class="quiz-manage direction-btn">
                <i class="fa-solid fa-circle-question"></i>
                <a href="{{route('student.document', [
                    'course_id' => $course_id,
                    'lesson_id' => $lesson_id,
                ])}}">Tài liệu</a>
            </div>
        </div>

        {{-- lesson description --}}
        <div class="lesson-description">
            <div class="content">
                <h1 class="title">{{$lesson->name}}</h1>
                <pre class="content">{{$lesson->description}}</pre>
            </div>
        </div>

        {{-- comment section --}}
        <div class="discussion">
            <div class="add-reply">
                <img class="avatar" src="{{asset("images/default-avatar.webp")}}" alt="defaulf-avt">
                <form class="reply-form" wire:submit.prevent='storeNewComment'>
                    <input type="text" placeholder="Thêm bình luận mới ..." wire:model="addComment">
                    <button type="submit">Bình luận</button>
                </form>
            </div>
            <div class="reply-list">
                @if ($commentList)
                    @foreach ($commentList as $comment)
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
</div>


@script
<script>
    window.addEventListener('videoPlayer:ended', (evt) => {
        console.log('video end');
        $wire.endVideo();
    });
</script>
@endscript