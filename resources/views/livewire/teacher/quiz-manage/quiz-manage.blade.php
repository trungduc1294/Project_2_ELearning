<div class="quiz-manage">

    {{-- road path --}}
    <div class="road_path">
        <div class="road_path_item">
            <a href="/teacher/courses-detail">Course Manage //</a>
        </div>
        <div class="road_path_item">
            <a href="/teacher/quiz-manage">Quiz Manage</a>
        </div>
    </div>

    {{-- Course info --}}
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
    </div>

    {{-- quiz list --}}
    <div class="quiz-container">

        <div class="quiz-nav">
            <div class="item">
                <i class="fas fa-plus"></i>
                <span>Add Quiz</span>
            </div>
        </div>

        <div class="quiz">
            <div class="quiz-question">
                <span>Question 1:</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
            </div>
            <div class="quiz-answer-block">
                <div class="quiz-answer">
                    <span>A </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore id tempore incidunt quisquam </p>
                </div>
                <div class="quiz-answer">
                    <span>B </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore id tempore incidunt quisquam </p>
                </div>
                <div class="quiz-answer quiz-answer-correct">
                    <span>C </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore id tempore incidunt quisquam </p>
                </div>
                <div class="quiz-answer">
                    <span>D </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore id tempore incidunt quisquam </p>
                </div>
            </div>
        </div>

    </div>


    {{ $title }}
</div>
