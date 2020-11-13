<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\Track;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        LogActivity::addToLog('Track Records Fetched');
        return view('admin.track')->with('tracks', $tracks);
    }

    public function edit($id)
    {
        $track = Track::findOrFail($id);
        LogActivity::addToLog('Edit Track Page Accessed');
        return view('admin.track-edit')->with('track', $track);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'track_name' => 'required|unique:tracks'
        ]);

        $track = Track::findOrFail($id);
        $track->track_name = $validatedData['track_name'];
        $track->save();
        LogActivity::addToLog('Track Data Updated');
        return redirect('track')->with('status', 'Track has been updated');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'track_name' => 'required|unique:tracks'
        ]);

        $track = Track::create([
            'track_name' => $validatedData['track_name']
        ]);

        $track->save();
        LogActivity::addToLog('Track Data Stored');
        return redirect('track')->with('status', 'Track has been added');
    }

    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();
        LogActivity::addToLog('Track Data Deleted');
        return redirect('track')->with('status', 'Track has been deleted');
    }
}
