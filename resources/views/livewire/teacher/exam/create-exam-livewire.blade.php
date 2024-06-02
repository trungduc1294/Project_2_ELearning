<div class="create_exam__container max-w-4xl py-10 mx-auto relative">

    <div class="routing mb-6">
        <a href="{{
            route('teacher.course.detail', [
                'id' => $course_id
            ])
        }}" class="font-semibold cursor-pointer">CourseDetail</a>
        <a href="" class="font-semibold text-gray-500">//CreateNewExam</a>
    </div>

    {{-- Add question button --}}
    <div class="add_button w-12 h-12 rounded-full bg-white absolute -right-14 bottom-20 flex items-center justify-center hover:bg-green-400 transform transition duration-300 ease-in-out cursor-pointer">
        <i class="fa-solid fa-plus text-black text-2xl"></i>
    </div>
{{-- ----------------------- HEADER ------------------------- --}}

    {{-- Header --}}
    <div class="exam_title bg-white rounded-lg">
        <div class="top_deco h-3 w-full bg-purple-400 rounded-t-lg"></div>
        <div class="title_content p-6">
            <input 
                class="w-full py-2 outline-none border-b border-gray-300 text-2xl text-black" 
                type="text" name="title" placeholder="Tên bài kiểm tra." 
                wire:model='exam_title'
            >
            <input 
                class="w-full py-2 outline-none border-b border-gray-300 text-black mt-4" 
                type="text" name="description" placeholder="Mô tả" 
                wire:model='exam_description'
            >

            <div class="date_time_picker mt-4 flex gap-4">
                <div class="date_time_picker_group">
                    <label for="start_time" class="block font-medium text-gray-400">Start Time</label>
                    <input 
                        type="datetime-local" name="start_time" id="start_time" 
                        class="w-full outline-none border-b border-gray-300 text-gray-500" 
                        wire:model='exam_start_time'
                    >
                </div>
                <div class="date_time_picker_group">
                    <label for="end_time" class="block font-medium text-gray-400">End Time</label>
                    <input 
                        type="datetime-local" name="end_time" id="end_time" 
                        class="w-full outline-none border-b border-gray-300 text-gray-500" 
                        wire:model='exam_end_time'
                    >
                </div>
            </div>

            @if ($is_exam_created)
                <div class="submit mt-4" wire:click='updateExam'>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                        Cập nhật
                    </button>
                </div>
            @else
                <div class="submit mt-4" wire:click='createExam'>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                        Tạo bài kiểm tra
                    </button>
                </div>
            @endif
            
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
                            <input type="text" class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black" wire:model="$question['question_text']" value="{{$question['question_text']}}">
                            <p class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black">{{$question['question_text']}}</p>
                            <span class="text-gray-700 w-40 border border-gray-300 rounded-md px-4 flex items-center">
                                Câu trả lời ngắn
                            </span>
                        </div>
            
                        <div class="text_option">
                            <p class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600">{{$question['options_text'][0]}}</p>
                        </div>
                        <i class="fa-solid fa-trash text-red-400 text-xl hover:text-red-700 mt-4 cursor-pointer" wire:click="deleteQuestionById({{$question['id']}})"></i>
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
            
                        <div class="text_option">
                            <pre class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600">
                                {{$question['options_text'][0]}}
                            </pre>
                        </div>
                        <i class="fa-solid fa-trash text-red-400 text-xl hover:text-red-700 mt-4 cursor-pointer" wire:click="deleteQuestionById({{$question['id']}})"></i>
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
                        <i class="fa-solid fa-trash text-red-400 text-xl hover:text-red-700 mt-4 cursor-pointer" wire:click="deleteQuestionById({{$question['id']}})"></i>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

{{-- ----------------------- CREATE NEW QUESTION ------------------------- --}}

    {{-- create question --}}
    <div class="create_question bg-white rounded-lg mt-10 hidden">
        <div class="top h-2 w-full bg-blue-500 rounded-t-lg"></div>
        <div class="main_content p-4">
            <div class="question flex gap-8">
                <input 
                    class="flex-1 px-2 py-4 outline-none bg-gray-100 border-b border-gray-700 text-black" 
                    type="text" name="question" placeholder="Câu hỏi không có tiêu đề" 
                    wire:model='question_text'
                >
                <select name="question_type" id="question_type" 
                    class="text-gray-700 w-40 border border-gray-300 rounded-md px-4" 
                    wire:model='question_type'>
                    <option value="0">Chọn loại câu hỏi</option>
                    <option value="text">Câu trả lời ngắn</option>
                    <option value="long_text">Đoạn dài</option>
                    <option value="multiple_choice">Trắc nghiệm</option>
                </select>
            </div>

            {{-- Text  --}}
            <div class="text_option hidden">
                <input 
                    type="text" name="essay_option" placeholder="Câu trả lời ngắn" 
                    class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600"
                    wire:model='text_answer'
                >
            </div>

            {{-- Long test --}}
            <div class="long_text_option hidden">
                <textarea 
                    name="long_text_option" id="long_text_option" placeholder="Câu trả lời dài" cols="30" rows="10" 
                    class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600"
                    wire:model='text_answer'
                ></textarea>
            </div>

            {{-- Multiple choice --}}
            <div class="multiple_choice_option hidden">
                @foreach ($multi_choice_answers as $index => $answer)
                    <div class="option">
                        <input type="text" placeholder="Câu trả lời" 
                            class="w-2/3 mt-2 p-2 outline-none border-b border-dotted border-gray-300 text-gray-600"
                            wire:model='multi_choice_answers.{{ $index }}'
                        >
                        <input type="radio" name="multiple_radio" class="ml-4" value="{{ $index }}" 
                            wire:model='selected_answer'
                        >
                    </div>
                @endforeach
            </div>

            <div class="submit mt-4" wire:click='createQuestion'>
                <button class="submit_btn bg-blue-500 text-white px-4 py-2 rounded-lg">Thêm câu hỏi</button>
            </div>
        </div>
    </div>

    

</div>

{{-- ----------------------- SCRIPT ------------------------- --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const add_button = document.querySelector('.add_button');
        const create_question = document.querySelector('.create_question');
        const submit_btn = document.querySelector('.submit_btn');
        add_button.addEventListener('click', () => {
            create_question.classList.remove('hidden');
        });
        submit_btn.addEventListener('click', () => {
            create_question.classList.add('hidden');
        });
    });
</script>

{{-- script to change input option of "text", "long_text", "multi-choice" when change select option --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const question_type = document.querySelector('#question_type');
        const text_option = document.querySelector('.text_option');
        const long_text_option = document.querySelector('.long_text_option');
        const multiple_choice_option = document.querySelector('.multiple_choice_option');

        question_type.addEventListener('change', () => {
            if (question_type.value == 'text') {
                text_option.classList.remove('hidden');
                long_text_option.classList.add('hidden');
                multiple_choice_option.classList.add('hidden');
            } else if (question_type.value == 'long_text') {
                text_option.classList.add('hidden');
                long_text_option.classList.remove('hidden');
                multiple_choice_option.classList.add('hidden');
            } else if (question_type.value == 'multiple_choice') {
                text_option.classList.add('hidden');
                long_text_option.classList.add('hidden');
                multiple_choice_option.classList.remove('hidden');
            }
        });
    });
</script>
