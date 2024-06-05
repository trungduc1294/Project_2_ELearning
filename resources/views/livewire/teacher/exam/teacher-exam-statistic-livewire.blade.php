<div class="statistic_container">
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

        <div class="button_comntainer flex gap-4">
            <a class="submit mt-4" href="{{
                route('teacher.exam.detail', [
                    'course_id' => $course_id,
                    'exam_id' => $exam->id
                ])
            }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                    Xem chi tiết
                </button>
            </a>

            <a class="submit mt-4" href="{{
                route('teacher.exam.statistic', [
                    'course_id' => $course_id,
                    'exam_id' => $exam->id
                ])
            }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                    Thống kê bài làm
                </button>
            </a>
        </div>
    </div>
</div>
