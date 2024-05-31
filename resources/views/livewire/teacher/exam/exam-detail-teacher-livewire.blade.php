<div class="exam_detail_container max-w-4xl py-10 mx-auto relative">

    <div class="routing mb-6">
        <a href="{{
            route('teacher.course.detail', [
                'id' => $course_id
            ])
        }}" class="font-semibold cursor-pointer">CourseDetail</a>
        <a href="" class="font-semibold text-gray-500">//ExamDetail</a>
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

            {{-- <div class="button_comntainer flex gap-4">
                <a class="submit mt-4" href="">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                        Xem chi tiết
                    </button>
                </a>
    
                <a class="submit mt-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                        Thống kê bài làm
                    </button>
                </a>
            </div> --}}
            
        </div>
    </div>

{{-- ----------------------- QUESTION LIST ------------------------- --}}

    

    {{-- question list --}}
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
                            <p class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600">{{$question['options_text'][0]}}</p>
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
                                {{$question['options_text'][0]}}
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
                                    @if ($question['correct_answer'][$index] == 1)
                                        <input type="radio" class="ml-4" checked>
                                    @else
                                        <input type="radio" class="ml-4" disabled>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</div>

{{-- ----------------------- SCRIPT ------------------------- --}}
