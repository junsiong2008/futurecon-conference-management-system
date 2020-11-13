<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Schedule;
use App\Track;
use App\Speaker;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        $tracks = Track::all();
        // $schedules1 =  Schedule::where('track_id', '=', '1')->get();
        $schedules = Schedule::orderBy('track_id')->get();
        LogActivity::addToLog('Schedule Record Fetched');
        return view('admin.schedule')
            ->with('schedules', $schedules)
            ->with('speakers', $speakers)
            ->with('tracks', $tracks);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'track_id' => 'required',
        ]);

        $schedule = new Schedule();
        $schedule->fill($validatedData);
        $schedule->speaker_id = $request->input('speaker_id');
        $schedule->save();
        LogActivity::addToLog('Schedule Data Stored');
        return redirect('schedule')->with('status', 'Schedule has been added');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $tracks = Track::all();
        $speakers = Speaker::all();

        LogActivity::addToLog('Edit Schedule Page Accessed');
        return view('admin.schedule-edit')
            ->with('schedule', $schedule)
            ->with('tracks', $tracks)
            ->with('speakers', $speakers);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_time' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'track_id' => 'required',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->fill($validatedData);
        $schedule->speaker_id = $request->input('speaker_id');
        $schedule->save();

        LogActivity::addToLog('Schedule Data Updated');
        return redirect('schedule')->with('status', 'Schedule has been updated');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        LogActivity::addToLog('Schedule Data Deleted');
        return redirect('schedule')->with('status', 'Schedule has been deleted');
    }
}
