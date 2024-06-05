<div class="quiz-page">
    <div class="back">
        <i class="fa-solid fa-arrow-left"></i>
        <a href="{{route('student.lesson.detail', [
            'course_id' => $course_id,
            'lesson_id' => $lesson_id
        ])}}">Quay lại bài giảng</a>
    </div>

    <div class="quiz-container">

        {{-- <div class="swiper"> --}}
            <div class="swiper-wrapper">

                {{-- quiz card element --}}
                <div class="swiper-slide">
                    <div class="quiz-block ">

                        <div class="question">
                            <div class="question-title">
                                <h3>Câu {{$quizList_index +1}}:</h3>
                            </div>
                            <div class="question-content">
                                <p>{{$quizList[$quizList_index]->question}}</p>
                            </div>
                        </div>

                        <div class="answers">
                            <div 
                                class="answer {{ isset($result) && $result['answer'] == 'A' ? 'bg-green-400' : 'bg-gray-400' }} " 
                                wire:click='returnAnswer("A", {{$quizList[$quizList_index]->id}})'
                            >
                                <div class="answer-title text-lg font-semibold">
                                    <h3 class="text-lg">A</h3>
                                </div>
                                <div class="answer-content">
                                    <p>{{$quizList[$quizList_index]->answer_a}}</p>
                                </div>
                            </div>
                            <div class="answer {{ isset($result) && $result['answer'] == 'B' ? 'bg-green-400' : 'bg-gray-400' }}"  wire:click='returnAnswer("B", {{$quizList[$quizList_index]->id}})'>
                                <div class="answer-title text-lg font-semibold">
                                    <h3 class="text-lg">B</h3>
                                </div>
                                <div class="answer-content">
                                    <p>{{$quizList[$quizList_index]->answer_b}}</p>
                                </div>
                            </div>
                            <div class="answer {{ isset($result) && $result['answer'] == 'C' ? 'bg-green-400' : 'bg-gray-400' }}"  wire:click='returnAnswer("C", {{$quizList[$quizList_index]->id}})'>
                                <div class="answer-title text-lg font-semibold">
                                    <h3 class="text-lg">C</h3>
                                </div>
                                <div class="answer-content">
                                    <p>{{$quizList[$quizList_index]->answer_c}}</p>
                                </div>
                            </div>
                            <div class="answer {{ isset($result) && $result['answer'] == 'D' ? 'bg-green-400' : 'bg-gray-400' }}"  wire:click='returnAnswer("D", {{$quizList[$quizList_index]->id}})'>
                                <div class="answer-title text-lg font-semibold">
                                    <h3 class="text-lg">D</h3>
                                </div>
                                <div class="answer-content">
                                    <p>{{$quizList[$quizList_index]->answer_d}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- controller element --}}
                <div class="next_btn absolute top-1/2 right-0 h-16 w-16 rounded-full justify-center flex items-center transition duration-100 ease-linear hover:bg-red-300 active:scale-110" wire:click='nextQuiz'>
                    <i class="fa-solid fa-arrow-right text-2xl"></i>
                </div>

                <div class="next_btn absolute top-1/2 left-0 h-16 w-16 rounded-full justify-center flex items-center transition duration-100 ease-linear hover:bg-red-300 active:scale-110" wire:click='prevQuiz'>
                    <i class="fa-solid fa-arrow-left text-2xl"></i>
                </div>

                

            </div>

        </div>

    {{-- </div> --}}
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