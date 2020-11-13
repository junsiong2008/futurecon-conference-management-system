<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::all();
        LogActivity::addToLog('Attendance Records Fetched');
        return view('admin.attendance')->with('attendance', $attendance);
    }

    public function verify(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        if($attendance->attendance_status == 0)
        {
            $attendance->attendance_status = 1;
            $attendance->save();
        }
        else if ($attendance->attendance_status == 1)
        {
            $attendance->attendance_status = 0;
            $attendance->save();
        }

        LogActivity::addToLog('Attendance Status Updated');
        return redirect('/attendance')->with('status', 'Attendance has been updated.');
    }
}
