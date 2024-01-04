<div class="lesson-detail-container" x-data="{
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
                ]) }}">Series Overview</a>
            </div>
        </div>

        <div class="course-info-container">
            <div class="course-title">
                <h3>{{$course->name}}</h3>
            </div>
            <div class="course-info">
                <div class="lessons item">
                    <i class="fa-solid fa-book"></i>
                    <span>15 Lessons</span>
                </div>
                <div class="duration item">
                    <i class="fa-solid fa-clock"></i>
                    <span>6h30m</span>
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

        <div class="video-container">
            {{-- <video src="https://www.youtube.com/watch?v=KAYny6V1rB0&pp=ygURU2VsZWN0aW5nIGEgU3RhY2s%3D"></video> --}}
            <img src="{{asset("images/quiz-logo.jpg")}}" alt="">
        </div>

        <div class="update-video-btn" x-on:click="openVideoPanel = !openVideoPanel;">
            <i class="fa-solid fa-video mr-2"></i>
            <span class="btn btn-primary">Update Video</span>
        </div>

        <div class="lesson-description">
            <div class="content">
                <h1 class="title">{{$lesson->name}}</h1>
                <p class="content">{{$lesson->description}}</p>
            </div>
            <div class="update"  x-on:click="openDescriptionPanel = !openDescriptionPanel;">
                <i class="fa-solid fa-pencil"></i>
            </div>
        </div>

        <div class="discussion">
            <div class="add-reply">
                <img class="avatar" src="{{asset("images/default-avatar.webp")}}" alt="defaulf-avt">
                <form class="reply-form" wire:submit.prevent='storeAddComment'>
                    <input type="text" placeholder="Add a reply..." wire:model="addComment">
                    <button type="submit">Reply</button>
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

        {{-- update description panel --}}
        <div class="panel-container update-description-panel" x-show="openDescriptionPanel">
            <div class="panel" @click.outside="openDescriptionPanel = false">
                <h1>Update Lesson Info</h1>
                <form wire:submit.prevent='updateLessonInfo'>
                    <div class="form-group">
                        <label for="name">Leson name:</label>
                        <input type="text" name="name" id="name" wire:model='lessonName'>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" wire:model='lessonDescription'>
                    </div>
                    <div class="submit">
                        <button type="submit" x-on:click="openDescriptionPanel = false">Update</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- update VIDEO panel --}}
        <div class="panel-container update-video-panel" x-show="openVideoPanel">
            <div class="panel" @click.outside="openVideoPanel = false">
                <h1>Update video</h1>
                <form>
                    <div class="form-group">
                        <label for="description">Video:</label>
                        <input type="file" name="description" id="description">
                    </div>
                    
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    
</div>
