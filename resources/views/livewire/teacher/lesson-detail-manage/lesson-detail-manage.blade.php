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
                <img src="{{asset("images/logo.jpg")}}" alt="">
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
                <pre class="content">{{$lesson->description}}</p>
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
                    {{-- <input type="text" name="description" id="description" wire:model='lessonDescription'> --}}
                    <textarea name="description" wire:model='lessonDescription' id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="submit">
                    <button type="submit" x-on:click="openDescriptionPanel = false">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

    {{-- update VIDEO panel --}}
    <div class="panel-container update-video-panel" x-show="openVideoPanel">
        <div class="panel relative" @click.outside="openVideoPanel = false">
            <h1>Cập nhật video bài giảng</h1>
            <form wire:submit.prevent='uploadVideo'>
                <div class="form-group">
                    <label for="video">Tải lên video:</label>
                    <input wire:model='video' type="file" name="video" id="video">
                    <div wire:loading wire:target="video" class="absolute top-0 left-0 w-full h-full bg-gray-500 opacity-50 flex justify-center items-center">
                        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    </div>
                </div>
                
                <div class="submit">
                    <button type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

