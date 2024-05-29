<div class="quiz-page">
    <div class="back">
        <i class="fa-solid fa-arrow-left"></i>
        <a href="{{route('student.lesson.detail', [
            'course_id' => $course_id,
            'lesson_id' => $lesson_id
        ])}}">Quay lại bài giảng</a>
    </div>

    <div class="quiz-container">

        <div class="swiper">
            <div class="swiper-wrapper">
                @if ($quizList)
                    @foreach ($quizList as $quiz)
                        <div class="swiper-slide">
                            <div class="quiz-block">
                                <div class="question">
                                    <div class="question-title">
                                        <h3>Câu {{$loop->index + 1}}:</h3>
                                    </div>
                                    <div class="question-content">
                                        <p>{{$quiz->question}}</p>
                                    </div>
                                </div>

                                <div class="answers">
                                    <div class="{{ isset($result) && $result["answer"] == "A" ? "answer is_answer" : "answer" }}" wire:click='returnAnswer("A", {{$quiz->id}})'>
                                        <div class="answer-title">
                                            <input type="hidden" name="answerA" >
                                            <h3>A</h3>
                                        </div>
                                        <div class="answer-content">
                                            <p>{{$quiz->answer_a}}</p>
                                        </div>
                                    </div>
                                    <div class="{{ isset($result) && $result["answer"] == "B" ? "answer is_answer" : "answer" }}"  wire:click='returnAnswer("B", {{$quiz->id}})'>
                                        <div class="answer-title">
                                            <h3>B</h3>
                                        </div>
                                        <div class="answer-content">
                                            <p>{{$quiz->answer_b}}</p>
                                        </div>
                                    </div>
                                    <div class="{{ isset($result) && $result["answer"] == "C" ? "answer is_answer" : "answer" }}"  wire:click='returnAnswer("C", {{$quiz->id}})'>
                                        <div class="answer-title">
                                            <h3>C</h3>
                                        </div>
                                        <div class="answer-content">
                                            <p>{{$quiz->answer_c}}</p>
                                        </div>
                                    </div>
                                    <div class="{{ isset($result) && $result["answer"] == "D" ? "answer is_answer" : "answer" }}"  wire:click='returnAnswer("D", {{$quiz->id}})'>
                                        <div class="answer-title">
                                            <h3>D</h3>
                                        </div>
                                        <div class="answer-content">
                                            <p>{{$quiz->answer_d}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev" wire:click='changeQuiz'></div>
            <div class="swiper-button-next" wire:click='changeQuiz'></div>

            <div class="swiper-scrollbar"></div>
        </div>

    </div>
</div>



{{-- 
<div class="quiz-block">
                        <div class="question">
                            <div class="question-title">
                                <h3>Question 1</h3>
                            </div>
                            <div class="question-content">
                                <p>What is the capital of the United States of America?</p>
                            </div>
                        </div>
                        <div class="answers">
                            <div class="answer">
                                <div class="answer-title">
                                    <h3>Answer 1</h3>
                                </div>
                                <div class="answer-content">
                                    <p>Washington D.C.</p>
                                </div>
                            </div>
                            <div class="answer">
                                <div class="answer-title">
                                    <h3>Answer 2</h3>
                                </div>
                                <div class="answer-content">
                                    <p>Washington D.C.</p>
                                </div>
                            </div>
                            <div class="answer">
                                <div class="answer-title">
                                    <h3>Answer 3</h3>
                                </div>
                                <div class="answer-content">
                                    <p>Washington D.C.</p>
                                </div>
                            </div>
                            <div class="answer">
                                <div class="answer-title">
                                    <h3>Answer 4</h3>
                                </div>
                                <div class="answer-content">
                                    <p>Washington D.C.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}