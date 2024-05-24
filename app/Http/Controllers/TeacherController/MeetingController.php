<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function getCreateMeetingPage(Request $request) {
        return view('pages.teacher.meeting.lobby');
    }

    public function getJoinRoomPage(Request $request) {
        return view('pages.teacher.meeting.join-room');
    }
}
