<div class="statistic_container max-w-[1000px] mx-auto">
    {{-- Exam header --}}
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

    {{-- ListStudent --}}
    <h1 class="text-2xl font-semibold border-t border-dashed border-white py-4">Danh sách học sinh</h1>
    <table class="w-full">
        <thead>
            <t class="">
                <th class="border border-gray-300 px-4 py-2">STT</th>
                <th class="border border-gray-300 px-4 py-2">Tên học sinh</th>
                <th class="border border-gray-300 px-4 py-2">Đã làm bài kiểm tra</th>
                <th class="border border-gray-300 px-4 py-2">Thời điểm nạp</th>
                <th class="border border-gray-300 px-4 py-2">Điểm tạm chấm</th>
                <th class="border border-gray-300 px-4 py-2">Điểm thực nhận</th>
                <th class="border border-gray-300 px-4 py-2">Xem bài chi tiết</th>
            </t>
        </thead>
        <tbody>
            {{-- submited student --}}
            @foreach ($listStudentSubmitedExam as $index => $student)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{$loop->index + 1}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$student['student_name']}}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <i class="fa-regular fa-circle-check text-xl text-green-400"></i>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{$student['submited_time']}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$student['temp_score']}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$student['score'] ?? 'Chưa có'}}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{
                            route('teacher.exam.student.detail', [
                                'course_id' => $course_id,
                                'exam_id' => $exam_id,
                                'student_id' => $student['student_id']
                            ])
                        }}">
                            <button class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-green-400 transform transition duration-200 ease-in-out">
                                Xem chi tiết
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
                
            {{-- not submited student --}}
            @foreach ($listStudentNotSubmitedExam as $index => $student)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{$loop->index + 1}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{$student['student_name']}}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <i class="fa-regular fa-circle-xmark text-xl text-red-400"></i>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">null</td>
                    <td class="border border-gray-300 px-4 py-2">Chưa có</td>
                    <td class="border border-gray-300 px-4 py-2">Chưa có</td>
                    <td class="border border-gray-300 px-4 py-2">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
