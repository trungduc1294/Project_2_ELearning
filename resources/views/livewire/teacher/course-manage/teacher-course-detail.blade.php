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
                <span>Thông Tin Chung</span>
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
                    <span>Bài Giảng</span>
              </div>
              <div class="students_manage tab-button" wire:click='changeStep("students")'>
                <span>Học Sinh</span>
              </div>
              <div class="meeting_manage tab-button" wire:click='changeStep("meeting")'>
                <span>Phòng Học Trực Tuyến</span>
              </div>
              <div class="example_manage tab-button" wire:click='changeStep("exams")'>
                <span>Kiểm Tra</span>
              </div>
            </div>

            {{-- Lesson List --}}
            @if ($step == "lesson-list")
                @livewire('teacher-lesson-list', ['courseId' => $courseId])
            @endif


            {{-- Students --}}
            @if ($step == "students")
                <div class="student-tab">
                    <a href="{{route('teacher.student.manage', ['id' => $courseId])}}">Quản lý học sinh</a>
                </div>
            @endif

            {{-- Meeting --}}
            @if ($step == "meeting")
                <div class="meeting-tab">
                    <a href="{{route('create.meeting')}}">Tạo phòng học</a>
                </div>
            @endif

            {{-- Exams --}}
            @if ($step == "exams")
                <div class="exam-tab">
                    <a href="#">Xem danh sách bài kiểm tra</a>
                </div>
                <div class="exam-tab">
                    <a href="{{
                        route('teacher.create-exam', ['course_id' => $courseId])
                    }}">Tạo bài kiểm tra</a>
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
                    <h1>Thông Tin Khóa Học</h1>
                </div>
                <i class="fa-solid fa-trash delete" wire:click='deleteCourse'></i>
            </div>
            <form wire:submit.prevent='updateCourseInfo'>
                <div class="form-group">
                    <label for="name">Tên khóa học:</label>
                    <input type="text" name="name" id="name" wire:model='updateCourseName'>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <input type="text" name="description" id="description" wire:model='updateCourseDescription'>
                </div>
                <div class="gen-code">
                    <div class="code">
                        <span>CODE tham gia: </span>
                        <span class="text-red-500">{{$course->reference_code ?? "null"}}</span>
                    </div>
                    <div class="gen-code-btn" wire:click='generateCourseCode'>
                        <button type="button">Tạo mã mới</button>
                    </div>
                </div>
                <div class="submit">
                    <button type="submit" x-on:click="openCourseInfoPanel = false">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>

</script>
