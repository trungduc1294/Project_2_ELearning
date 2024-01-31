<div>
    <div class="course_detail">
        <div class="teacher_detail">
            <div class="teacher_detail_container">
                <div class="avatar">
                    <img src="{{asset("images/course_detail/teacher_img/jeffey.png")}}">
                </div>
                <div class="teacher_info">
                    <div class="name">
                        <h3>{{$teacher->username}}</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="course_content">
            <div class="summary_course">
                <div class="course_name">
                    <h1>{{$course->name}}</h1>
                    <div class="{{ $isJoined ? 'join_course joined' : 'join_course' }}">
                        @if ($isJoined)
                            <span>Joined</span>
                        @elseif ($isRequesting)
                            <span>Requesting</span>
                        @else
                            <span wire:click='requestJoinCourse'>Join Course</span>
                        @endif
                    </div>
                </div>
                <div class="course_category">
                    <span>{{$category->name}}</span>
                </div>
                <div class="course_description">
                    <p>{{$course->description}}</p>
                </div>
            </div>

            <div class="lessons_list">

                <div class="course_nav">
                    <div class="play_course tab" wire:click='changeTab("lessonsList")'>
                        <a href="#">
                            <i class="fas fa-play"></i>
                            <span>Play Course</span>
                        </a>
                    </div>
                    <div class="meeting tab" wire:click='changeTab("meeting")'>
                        <span>Join Meeting</span>
                    </div>
                </div>

                @if ($tab == "lessonsList")
                <div class="lessons">
                    @if ($lessonList)
                        @foreach ($lessonList as $lesson)
                            <div class="{{ $isJoined ? 'lesson cursor-pointer' : 'lesson cursor-not-allowed' }}"
                            @if ($isJoined)
                                onclick="window.location.href = '{{route('student.lesson.detail', [
                                    'course_id' => $course->id,
                                    'lesson_id' => $lesson->id
                                ])}}'"
                            @else
                                onclick="alert('You have to join this course first')"
                            @endif
                            >
                                <div class="progress_check">
                                    <div class="check">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="lesson_info">
                                    <div class="lesson_name">
                                        <h3>{{$lesson->name}}</h3>
                                    </div>
                                    <div class="lesson_decs">
                                        <p>{{$lesson->description}}</p>
                                    </div>
                                    <div class="lesson_duration">
                                        <span>0h 2m 40s</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @endif

                @if ($tab == "meeting")
                <div class="meeting">
                    Meeting
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
