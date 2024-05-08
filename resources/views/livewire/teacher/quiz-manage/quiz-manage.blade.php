<div class="quiz-manage" x-cloak>

    {{-- road path --}}
    <div class="road_path">
        <div class="road_path_item">
            <a href="{{route('teacher.course.detail', ['id' => $course_id])}}">Course Detail //</a>
        </div>
        <div class="road_path_item">
            <a href="">Quiz Manage</a>
        </div>
    </div>

    {{-- Course info --}}
    <div class="course_content">
        <div class="summary_course">
            <div class="course_name">
                <h1>{{$course->name}}</h1>
            </div>
            <div class="course_category">
                <span>Web Development</span>
            </div>
            <div class="course_description">
                <p>{{$course->description}}</p>
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
                <span>Thêm câu hỏi</span>
            </div>
        </div>

        <div class="quiz-list">
            @if ($quizList)
                @foreach ($quizList as $quiz)
                    <div class="quiz" x-on:click="openUpdateQuiz = !openUpdateQuiz">
                        <div class="quiz-question">
                            <span>Question {{$loop->index + 1}}:</span>
                            <p>{{$quiz->question}}</p>
                            <i class="fa-solid fa-delete-left z-100" wire:click='deleteQuestion({{$quiz->id}})'></i>
                        </div>
                        <div class="quiz-answer-block">
                            <div class="{{
                                $quiz->correct_answer == 'A' ? 'quiz-answer quiz-answer-correct' : 'quiz-answer'
                            }}">
                                <span>A </span>
                                <p>{{$quiz->answer_a}}</p>
                            </div>
                            <div class="{{
                                $quiz->correct_answer == 'B' ? 'quiz-answer quiz-answer-correct' : 'quiz-answer'
                            }}">
                                <span>B </span>
                                <p>{{$quiz->answer_b}} </p>
                            </div>
                            <div class="{{
                                $quiz->correct_answer == 'C' ? 'quiz-answer quiz-answer-correct' : 'quiz-answer'
                            }}">
                                <span>C </span>
                                <p>{{$quiz->answer_c}} </p>
                            </div>
                            <div class="{{
                                $quiz->correct_answer == 'D' ? 'quiz-answer quiz-answer-correct' : 'quiz-answer'
                            }}">
                                <span>D </span>
                                <p>{{$quiz->answer_d}} </p>
                            </div>
                        </div>
                    </div>   
                @endforeach
            @endif
        </div>

        {{-- create quiz panel --}}
        <div class="create-quiz-container" x-show="openCreateQuiz">
            <div class="create-quiz-panel" @click.outside="openCreateQuiz = false">
                <h1>Create new quiz</h1>
                <form>
                    <div class="question">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question" wire:model='newQuestion'>
                    </div>
                    <div class="answer-block">
                        <div class="answer">
                            <label for="answer">A:</label>
                            <input type="text" name="answer_a" id="answer_a" wire:model='newAnswerA'>
                        </div>
                        <div class="answer">
                            <label for="answer">B:</label>
                            <input type="text" name="answer_b" id="answer_b" wire:model='newAnswerB'>
                        </div>
                        <div class="answer">
                            <label for="answer">C:</label>
                            <input type="text" name="answer_c" id="answer_c" wire:model='newAnswerC'>
                        </div>
                        <div class="answer">
                            <label for="answer">D:</label>
                            <input type="text" name="answer_d" id="answer_d" wire:model='newAnswerD'>
                        </div>
                    </div>
                    <div class="correct-answer">
                        <label for="correct-answer">Correct answer:</label>
                        <select name="correct-answer" id="correct-answer" wire:model='newCorrectAnswer'>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="submit" x-on:click="openCreateQuiz = false" wire:click.prevent='addQuestion'>
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- update quiz panel --}}
        <div class="update-quiz-container" x-show="openUpdateQuiz">
            <div class="update-quiz-panel" @click.outside="openUpdateQuiz = false">
                <h1>Update quiz</h1>
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

</div>
