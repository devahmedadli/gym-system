<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function checkIn($id)
    {

        $current_date = date("Y-m-d");
        $current_time = date("H:i:s");

        // return $current_time;
        
        $attendance = new Attendance();

        $attendance->user_id        = $id;
        $attendance->current_date   = $current_date;
        $attendance->current_time   = $current_time;
        $attendance->present        = 1;

        $attendance->save();

        
        // Increasing Member attendance
        if(Member::find($id))
        {
            $member = Member::find($id);
            $member->attendance_count += 1;
            $member->check_in = 1;
            $member->save();
        }

        return back();
    }


    public function checkOut($id)
    {

        $current_date = date("Y-m-d");
        $current_time = date("H:i:s");

        if(Member::find($id))
        {
            $member             = Member::find($id);
            $member->check_in   = 0;
            $member->save();

            $attendance                 = new Attendance();
            $attendance->user_id        = $id;
            $attendance->current_date   = $current_date;
            $attendance->current_time   = $current_time;
            $attendance->present        = 0;
            $attendance->save();

            return back();
        }
        return back();
    }

    // View Attendance
    public function viewAttendance ()
    {
        return Member::membersTo("attendanceView");
    }
}
