<div class="student_review_exam__container max-w-4xl py-10 mx-auto relative">

    <div class="temp_score my-4 bg-white p-4 rounded-lg w-[200px] fixed left-10 top-24 shadow-xl">
        <h2 class="text-lg font-semibold text-gray-700">Điểm tạm chấm</h2>
        <div class="text-lg text-red-400">{{$examScore}}/{{count($questions)}}</div>
    </div>

    {{-- submited answer --}}
    <div class="score my-4 bg-white p-4 rounded-lg w-[200px] fixed left-10 top-56 shadow-xl">
        <h2 class="text-lg font-semibold text-gray-700">Điểm giáo viên chấm</h2>
        {{-- <input type="text" class="border-b border-dotted border-gray-700 outline-none text-xl text-red-400 font-semibold w-[50px]" wire:model='teacherGiveScore'> --}}
        {{-- <button class="bg-blue-500 text-white px-2 py-1 rounded-lg" wire:click='submitTeacherScore'>Chấm</button> --}}
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

    <div class="question_list mt-10">
            
        @foreach ($questions as $question)
            @if ($question['question_type'] == 'text')
                <div class="text_question bg-white rounded-lg mt-2">
                    <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
                    <div class="main_content p-4">
                        <div class="question flex gap-8">
                            <p class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black">{{$question['question_text']}}</p>
                            <span class="text-gray-700 w-40 border border-gray-300 rounded-md px-4 flex items-center">
                                Câu trả lời ngắn
                            </span>
                        </div>
            
                        <div class="'text_option'">
                            <p class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600">{{$question['user_answer']}}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($question['question_type'] == 'long_text')
                <div class="long_text_question bg-white rounded-lg mt-2">
                    <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
                    <div class="main_content p-4">
                        <div class="question flex gap-8">
                            <p class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black">{{$question['question_text']}}</p>
                            <span class="text-gray-700 w-40 border border-gray-300 rounded-md px-4 flex items-center">
                                Đoạn văn
                            </span>
                        </div>
            
                        <div class="'text_option'">
                            <pre class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600">
                                {{$question['user_answer']}}
                            </pre>
                        </div>
                    </div>
                </div>
            @endif
            @if ($question['question_type'] == 'multiple_choice')
                <div class="text_question bg-white rounded-lg mt-2">
                    <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
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
                                    @if ($option_text == $question['user_answer'])
                                        <input type="radio" class="ml-4" checked>
                                    @else
                                        <input type="radio" class="ml-4" disabled>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="check flex justify-end">
                            @if ($question['is_correct'])
                                <i class="fa-solid fa-check text-green-500 text-4xl bg-green-200 w-12 h-12 rounded-full flex justify-center items-center"></i>
                            @else
                                <i class="fa-regular fa-circle-xmark text-red-400 text-4xl"></i>
                            @endif
                        </div>
                        
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</div>

{{-- ----------------------- SCRIPT ------------------------- --}}