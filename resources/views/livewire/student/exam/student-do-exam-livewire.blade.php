<div class="student_do_exam__container max-w-4xl py-10 mx-auto relative">

    <div class="clock my-4 bg-white p-4 rounded-lg w-[200px] fixed left-10 top-24 shadow-xl">
        <h2 class="text-lg font-semibold text-gray-700">Time Remaining</h2>
        <div id="countdown" class="text-lg text-red-400"></div>
    </div>

    {{-- submited answer --}}
    <div class="submited_grid bg-white w-[200px] p-2 rounded-md fixed left-10 top-56">
        <h1 class="text-xl font-semibold text-red-500">Danh sách câu hỏi</h1>

        <div class="question_tag flex flex-wrap w-full py-2">
            @foreach ($submited_answers_index as $index => $submited_answer)
                <div class="{{$submited_answer == true ? 'bg-green-500' : 'bg-gray-500'}} w-7 h-10 flex justify-center items-center rounded-md m-1">{{$index + 1}}</div>
            @endforeach
        </div>

    </div>

    {{-- Header --}}
    <div class="exam_title bg-white rounded-lg mb-6">
        <div class="top_deco h-3 w-full bg-purple-400 rounded-t-lg"></div>
        <div class="title_content p-6">
            <p class="w-full py-2 border-b border-gray-300 text-2xl text-black">
                {{$exam->title}}
            </p>
            <p class="w-full py-2 outline-none border-b border-gray-300 text-black mt-4">
                {{$exam->description}}
            </p>

            <div class="date_time_picker mt-4 flex gap-4">
                <div class="date_time_picker_group">
                    <label class="block font-medium text-gray-400">Start Time</label>
                    <span class="w-full outline-none border-b border-gray-300 text-gray-500">{{$exam->start_time}}</span>
                </div>
                <div class="date_time_picker_group">
                    <label class="block font-medium text-gray-400">End Time</label>
                    <span class="w-full outline-none border-b border-gray-300 text-gray-500">{{$exam->end_time}}</span>
                </div>
            </div>
        </div>
    </div>

{{-- ----------------------- QUESTION LIST ------------------------- --}}

    

    {{-- question list --}}
    <div class="question_list mt-10">
        
        @foreach ($questions as $question_index => $question)
            @if ($question['question_type'] == 'text')
                <div class="text_question bg-white rounded-lg mt-2">
                    <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
                    <h1 class="text-black px-4 mt-2 font-semibold">Câu {{$question_index + 1}}: Điền đáp án đúng.</h1>
                    <div class="main_content p-4">
                        <div class="question flex gap-8">
                            <p class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black">{{$question['question_text']}}</p>
                            <span class="text-gray-700 w-40 border border-gray-300 rounded-md px-4 flex items-center">
                                Câu trả lời ngắn
                            </span>
                        </div>
            
                        <div class="'text_option'">
                            <input 
                                type="text" placeholder="Điền đáp án vào đây" 
                                class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600"
                                wire:model='answers.{{$question_index}}'
                            >
                        </div>

                            <div class="btn_container flex justify-end" 
                            wire:click='submitAnswer({{$question['id']}}, {{$question_index}})'>
                                <button class="btn bg-blue-400 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">Submit</button>
                            </div>
                    </div>
                </div>
            @endif

            @if ($question['question_type'] == 'long_text')
                <div class="long_text_question bg-white rounded-lg mt-2">
                    <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
                    <h1 class="text-black px-4 mt-2 font-semibold">Câu {{$question_index + 1}}: Điền đáp án đúng.</h1>
                    <div class="main_content p-4">
                        <div class="question flex gap-8">
                            <p class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black">{{$question['question_text']}}</p>
                            <span class="text-gray-700 w-40 border border-gray-300 rounded-md px-4 flex items-center">
                                Đoạn văn
                            </span>
                        </div>
            
                        <div class="'text_option'">
                            <textarea 
                                name="" id="" cols="30" rows="10" 
                                class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600"
                                wire:model='answers.{{$question_index}}'
                            ></textarea>
                        </div>

                            <div class="btn_container flex justify-end" 
                            wire:click='submitAnswer({{$question['id']}}, {{$question_index}})'>
                                <button class="btn bg-blue-400 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">Submit</button>
                            </div>
                    </div>
                </div>
            @endif

            @if ($question['question_type'] == 'multiple_choice')
                <div class="text_question bg-white rounded-lg mt-2">
                    <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
                    <h1 class="text-black px-4 mt-2 font-semibold">Câu {{$question_index + 1}}: Chọn đáp án đúng.</h1>
                    <div class="main_content p-4">
                        <div class="question flex gap-8">
                            <p class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black">{{$question['question_text']}}</p>
                            <span class="text-gray-700 w-40 border border-gray-300 rounded-md px-4 flex items-center">
                                Trắc nghiệm
                            </span>
                        </div>
                        <div>
                            @foreach ($question['options_text'] as $index => $option_text)
                                <div class="option flex">
                                    <p class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600">{{$option_text}}</p>
                                    <input 
                                        type="radio" name="question_{{$question_index}}" value="{{$option_text}}" 
                                        class="ml-4"
                                        wire:model='answers.{{$question_index}}'
                                    >
                                </div>
                            @endforeach
                        </div>

                            <div class="btn_container flex justify-end" 
                            wire:click='submitAnswer({{$question['id']}}, {{$question_index}})'>
                                <button class="btn bg-blue-400 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">Submit</button>
                            </div>
                    </div>
                </div>
            @endif
        @endforeach

        {{-- submit exam --}}
        <div class="submit_exam flex justify-center mt-10">
            <button class="btn bg-blue-400 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600" wire:click='submitExam'>
                Kết thúc bài thi
            </button>
        </div>
        
    </div>

</div>

{{-- ----------------------- SCRIPT ------------------------- --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var startTime = new Date(@js($start_time));
        var endTime = new Date(@js($end_time));
        console.log(startTime, endTime);
        var countdownElement = document.getElementById('countdown');
    
        function updateCountdown() {
            var now = new Date();
            var timeRemaining = endTime - now;
    
            if (now < startTime) {
                countdownElement.innerHTML = "Exam hasn't started yet.";
            } else if (timeRemaining > 0) {
                var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                countdownElement.innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
            } else {
                countdownElement.innerHTML = "Exam has ended.";
                clearInterval(interval);
            }
        }
    
        var interval = setInterval(updateCountdown, 1000);
        updateCountdown();
    });
    </script>