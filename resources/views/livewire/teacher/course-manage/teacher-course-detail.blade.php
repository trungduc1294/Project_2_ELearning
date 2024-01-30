<div class="course_detail relative"
    x-data="{ openCourseInfoPanel: false }"
    x-cloak
>

    {{-- road path --}}
    <div class="road_path absolute top-5 left-20">
        <div class="road_path_item">
            <a href="/teacher/courses-list">Courses List //</a>
        </div>
        <div class="road_path_item">
            <a href="">Course Detail</a>
        </div>
    </div>

    {{-- main content --}}
    <div class="teacher_detail">
        <div class="teacher_detail_container">
            <div class="avatar">
                <img src="{{asset("images/course_detail/teacher_img/jeffey.png")}}">
            </div>
            <div class="teacher_info">
                <div class="name">
                    <h3>{{ $teacher->username }}</h3>
                </div>
            </div>
            <div class="course-info" x-on:click="openCourseInfoPanel = !openCourseInfoPanel">
                <span>Course Info</span>
            </div>
        </div>
    </div>
    <div class="course_content">
        <div class="summary_course">
            <div class="course_name">
                <h1>{{$course->name}}</h1>
            </div>
            <div class="course_category">
                <span>{{$course_category_name}}</span>
            </div>
            <div class="course_description">
                <p>{{$course->description}}</p>
            </div>
        </div>

        <div class="lessons_list">
            <div class="course_nav">
              <div class="play_course tab-button" wire:click='changeStep("lesson-list")'>
                    <i class="fas fa-play"></i>
                    <span>Lesson List</span>
              </div>
              <div class="students_manage tab-button" wire:click='changeStep("students")'>
                <span>Students</span>
              </div>
              <div class="meeting_manage tab-button" wire:click='changeStep("meeting")'>
                <span>Meeting</span>
              </div>
              <div class="example_manage tab-button" wire:click='changeStep("exams")'>
                <span>Exams</span>
              </div>
            </div>

            {{-- Lesson List --}}
            @if ($step == "lesson-list")
                @livewire('teacher-lesson-list', ['courseId' => $courseId])
            @endif


            {{-- Students --}}
            @if ($step == "students")
                <div class="student-tab">
                    <a href="{{route('teacher.student.manage', ['id' => $courseId])}}">Go to your Student Manage Page</a>
                </div>
            @endif

            {{-- Meeting --}}
            @if ($step == "meeting")
                <div class="meeting-tab">
                    <a href="{{route('teacher.create.meeting', ['course_id' => $courseId])}}">Create new Meeting Room</a>
                </div>
            @endif

            {{-- Exams --}}
            @if ($step == "exams")
                <div class="exam-tab">
                    <a href="#">Create new Exam</a>
                </div>
            @endif
        </div>
    </div>

    {{-- course Info panel --}}
    <div class="panel-container" x-show="openCourseInfoPanel">
        <div class="panel course-info-panel" @click.outside="openCourseInfoPanel = false">
            <div class="header">
                <div class="title-panel">
                    <i class="fa-solid fa-circle-info"></i>
                    <h1>Lesson Info</h1>
                </div>
                <i class="fa-solid fa-trash delete" wire:click='deleteCourse'></i>
            </div>
            <form wire:submit.prevent='updateCourseInfo'>
                <div class="form-group">
                    <label for="name">Course name:</label>
                    <input type="text" name="name" id="name" wire:model='updateCourseName'>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" wire:model='updateCourseDescription'>
                </div>
                <div class="gen-code">
                    <div class="code">
                        <span>Course code: </span>
                        <span>{{$course->reference_code ?? "null"}}</span>
                    </div>
                    <div class="gen-code-btn" wire:click='generateCourseCode'>
                        <button type="button">Generate new code</button>
                    </div>
                </div>
                <div class="submit">
                    <button type="submit" x-on:click="openCourseInfoPanel = false">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>

</script>
