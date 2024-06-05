<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Exam;
use App\Models\ExamScore;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class TeacherExamStatisticLivewire extends Component
{
    public $course_id;
    public $course;
    public $exam_id;
    public $exam;

    public $listStudentSubmitedExam;
    public $listStudentNotSubmitedExam;

    public function fetchData() {
        $this->listStudentSubmitedExam = $this->getListStudentSubmitedExam();
        $this->listStudentNotSubmitedExam = $this->getListStudentNotSubmitedExam();
    }
    public function mount() {
        $this->course = Course::find($this->course_id);
        $this->exam = Exam::find($this->exam_id);
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.teacher.exam.teacher-exam-statistic-livewire');
    }

    // ============================= CUS FUCNT =============================

    public function getListStudentSubmitedExam() {
        $exam_score_students = ExamScore::where('exam_id', $this->exam_id)->get();
        foreach ($exam_score_students as $exam_score) {
            $student = User::find($exam_score->student_id);
            $list_student_submited_exam[] = [
                'student_id' => $student->id,
                'student_name' => $student->username,
                'score' => $exam_score->score,
                'temp_score' => $exam_score->temp_score,
                'is_submited' => true,
                'submited_time' => Carbon::parse($exam_score->created_at)->timezone('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s'),
            ];
        }
        // dd($list_student_submited_exam[0]['student_name']);
        return $list_student_submited_exam;
    }

    public function getListStudentNotSubmitedExam() {
        // get array student_id, who submited exam
        $exam_score_students_id = ExamScore::where('exam_id', $this->exam_id)->pluck('student_id')->toArray();
        // get array student_id, who not submited exam
        $course_students_id = CourseStudent::where('course_id', $this->course_id)->pluck('student_id')->toArray();
        $list_student_not_submited_exam_id = array_diff($course_students_id, $exam_score_students_id);

        foreach ($list_student_not_submited_exam_id as $student_id) {
            $student = User::find($student_id);
            $list_student_not_submited_exam[] = [
                'student_id' => $student->id,
                'student_name' => $student->username,
                'score' => null,
                'temp_score' => null,
                'is_submited' => false,
                'submited_time' => null,
            ];
        }
        // dd($list_student_not_submited_exam[0]['student_name']);
        return $list_student_not_submited_exam;
    }
}
