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
    <div class="quiz-container" x-data="{
        openCreateQuiz: false,
        openUpdateQuiz: false,
    }">

        <div class="quiz-nav" >
            <div class="item" 
            x-on:click="
                openCreateQuiz = !openCreateQuiz; 
                window.scrollTo({ top: 0, behavior: 'smooth' })
            ">
                <i class="fas fa-plus"></i>
                <span>Add Quiz</span>
            </div>
        </div>

        <div class="quiz" x-on:click="openUpdateQuiz = !openUpdateQuiz">
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

        {{-- create quiz panel --}}
        <div class="create-quiz-container" x-show="openCreateQuiz">
            <div class="create-quiz-panel" @click.outside="openCreateQuiz = false">
                <h1>Create new quiz</h1>
                <form>
                    <div class="question">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question">
                    </div>
                    <div class="answer-block">
                        <div class="answer">
                            <label for="answer">A:</label>
                            <input type="text" name="answer_a" id="answer_a">
                        </div>
                        <div class="answer">
                            <label for="answer">B:</label>
                            <input type="text" name="answer_b" id="answer_b">
                        </div>
                        <div class="answer">
                            <label for="answer">C:</label>
                            <input type="text" name="answer_c" id="answer_c">
                        </div>
                        <div class="answer">
                            <label for="answer">D:</label>
                            <input type="text" name="answer_d" id="answer_d">
                        </div>
                    </div>
                    <div class="correct-answer">
                        <label for="correct-answer">Correct answer:</label>
                        <select name="correct-answer" id="correct-answer">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C" selected>C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="submit">
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- update quiz panel --}}
        <div class="update-quiz-container" x-show="openUpdateQuiz">
            <div class="update-quiz-panel" @click.outside="openUpdateQuiz = false">
                <h1>Create new quiz</h1>
                <form>
                    <div class="question">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question">
                    </div>
                    <div class="answer-block">
                        <div class="answer">
                            <label for="answer">A:</label>
                            <input type="text" name="answer_a" id="answer_a">
                        </div>
                        <div class="answer">
                            <label for="answer">B:</label>
                            <input type="text" name="answer_b" id="answer_b">
                        </div>
                        <div class="answer">
                            <label for="answer">C:</label>
                            <input type="text" name="answer_c" id="answer_c">
                        </div>
                        <div class="answer">
                            <label for="answer">D:</label>
                            <input type="text" name="answer_d" id="answer_d">
                        </div>
                    </div>
                    <div class="correct-answer">
                        <label for="correct-answer">Correct answer:</label>
                        <select name="correct-answer" id="correct-answer">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C" selected>C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{ $title }}
</div>
