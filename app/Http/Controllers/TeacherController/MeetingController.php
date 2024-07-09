<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function getCreateMeetingPage(Request $request) {
        return view('pages.teacher.meeting.lobby');
    }

    public function getJoinRoomPage(Request $request) {
        return view('pages.teacher.meeting.join-room');
    }

    public function saveMeetingId(Request $request, $course_id) {
        $meetingId = $request->meetingId;
        // $request->session()->put('meetingId', $meetingId);
        $request->validate([
            'meetingId' => 'required|string'
        ]);

        // save to db
        $course = Course::find($course_id);
        if (!$course) {
            return response()->json([
                'message' => 'Course not found'
            ], 404);
        }
        $course->meeting_code = $meetingId;
        $course->save();

        return response()->json([
            'message' => 'Meeting ID saved successfully'
        ]);
    }
}
