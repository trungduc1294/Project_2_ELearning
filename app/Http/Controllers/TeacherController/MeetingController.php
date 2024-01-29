<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function getCreateMeetingPage(Request $request) {
        return view('pages.teacher.meeting.lobby', [
            'course_id' => $request->course_id,
        ]);
    }

    public function getJoinRoomPage(Request $request) {
        return view('pages.teacher.meeting.join-room', [
            'course_id' => $request->course_id,
        ]);
    }
}
