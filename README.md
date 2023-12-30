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
