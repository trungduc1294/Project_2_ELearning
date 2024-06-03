<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamScore;
use Livewire\Component;
use Carbon\Carbon;

class StudentListExamLivewire extends Component
{
    public $course_id;
    public $course;
    public $exams;

    public function fetchData() {
        $this->exams = $this->getAllExamOfCourse($this->course_id);
    }
    public function mount() {
        $this->course = $this->getCourseById($this->course_id);
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.student.exam.student-list-exam-livewire');
    }

    // ======================= CUS FUNCTION =======================
    public function getAllExamOfCourse($course_id) {
        return Exam::where('course_id', $course_id)->get();
    }
    public function getCourseById($course_id) {
        return Course::find($course_id);
    }

    public function doExam($exam_id) {
        $exam = Exam::find($exam_id);
        // Kiểm tra xem kỳ thi có tồn tại không
        if (!$exam) {
            $this->dispatch('swal', title:'Kỳ thi không tồn tại.', type: 'error');
            return;
        }
        // Kiểm tra thời gian bắt đầu và kết thúc
        $timezone = 'Asia/Ho_Chi_Minh';
        $now = Carbon::now($timezone);
        if ($exam->start_time > $now) {
            $this->dispatch('swal', title: 'Chưa đến thời gian bắt đầu.', type: 'error');
            return;
        }
        if ($exam->end_time < $now) {
            $this->dispatch('swal', title: 'Quá thời gian kết thúc.', type: 'error');
            return;
        }
        if (ExamScore::where('exam_id', $exam_id)->where('student_id', session('userId'))->first()) {
            $this->dispatch('swal', title: 'Bạn đã làm bài kiểm tra này rồi.', type: 'error');
            return;
        }

        return redirect()->route('student.exam.do', ['course_id' => $this->course_id, 'exam_id' => $exam_id]);
    }

    public function reviewExam($exam_id) {
        $exam_score = ExamScore::where('exam_id', $exam_id)->where('student_id', session('userId'))->first();
        if (!$exam_score) {
            $this->dispatch('swal', title: 'Không tìm  bài làm của bạn, hoặc bạn chưa làm bài kiểm tra này.', type: 'error');
            return;
        }
        return redirect()->route('student.exam.review', ['course_id' => $this->course_id, 'exam_id' => $exam_id]);
    }
}
