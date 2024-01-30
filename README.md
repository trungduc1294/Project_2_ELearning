### Livewire Life Cycle

1. Tạo router cho page
Ví dụ:
`Route::any('/teacher/quiz-manage', [TeacherQuiz::class, 'index'])->name('quiz-manage');`

2. Vào controller xử lý và gửi những dữ liệu cần gửi vào page
public function index()
    {
        return view('pages.teacher.quiz.page-teacher-quiz', [
            'title' => 'Quiz Manage'
        ]);
    }

3. Vào view page gọi đến livewire
`@livewire('quiz-manage', ['title' => $title])`

4. Vào livewire controller nhận $title và xử lý
`public $title;`

5. Vào livewire blade có thể nhận được data

========================================================================================
# Thêm vào model Leson trường lesson_order thể hiện thứ tự của lesson trong 1 course, tự động điền khi add lesson

# Đưa quiz vào trong lesson, cho tạo quiz cho từng lesson, thêm trường quiz_order để thể hiện thứ tự quiz trong 1 lesson



@if (session()->has('error'))
                    <div class="error">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif