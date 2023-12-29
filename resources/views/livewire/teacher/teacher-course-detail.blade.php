<div class="course_detail">

    
    <div class="teacher_detail">
        <div class="teacher_detail_container">
            <div class="avatar">
                <img src="{{asset("images/course_detail/teacher_img/jeffey.png")}}">
            </div>
            <div class="teacher_info">
                <div class="name">
                    <h3>Jeffrey Way</h3>
                </div>
            </div>
            <div class="course-info">
                <a href="">Course Info</a>
            </div>
        </div>
    </div>
    <div class="course_content">
        <div class="summary_course">
            <div class="course_name">
                <h1>Laravel 8 From Scratch</h1>
            </div>
            <div class="course_category">
                <span>Web Development</span>
            </div>
            <div class="course_description">
                <p>We don't learn tools for the sake of learning tools. Instead, we learn them because they help us accomplish a particular goal. With that in mind, in this series, we'll use the common desire for a blog - with categories, tags, comments, email notifications, and more - as our goal. Laravel will be the tool that helps us get there. Each lesson, geared toward newcomers to Laravel, will provide instructions and techniques that will get you to the finish line.</p>
            </div>
        </div>

        <div class="lessons_list">
            <div class="course_nav">
              <div class="play_course tab-button" wire:click='changeStep("lesson-list")'>
                  <a href="">
                      <i class="fas fa-play"></i>
                      <span>Lesson List</span>
                  </a>
              </div>
              <div class="take_quiz tab-button" wire:click='changeStep("quiz")'>
                  <span>Quiz</span>
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
                <livewire:teacher-lesson-list>
            @endif

            {{-- Quiz --}}
            @if ($step == "quiz")
                <livewire:teacher-quiz-tab>
            @endif

            {{-- Students --}}
            @if ($step == "students")
                <livewire:students-tab>
            @endif

            {{-- Meeting --}}
            @if ($step == "meeting")
                <livewire:meeting-tab>
            @endif

            {{-- Exams --}}
            @if ($step == "exams")
                <livewire:exams-tab>
            @endif
        </div>
    </div>
</div>

<script>

</script>
