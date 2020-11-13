<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Speaker;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();
        LogActivity::addToLog('Speakers Record Fetched');
        return view('admin.speaker')->with('speakers', $speakers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'speaker_name' => 'required|unique:speakers',
            'speaker_email' => 'required|email',
            'speaker_bio' => 'required',
            'speakerImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $speaker = new Speaker();
        $speaker->fill($validatedData);

        if ($request->hasFile('speakerImg')) {
            $fileName = "speakerImage-" . time() . '.' . request()->speakerImg->getClientOriginalExtension();
            $imagePath = (request('speakerImg')->storeAs('speakerImg', $fileName, 'public'));
            $image =
                $speaker->speakerImg = $imagePath;
        }

        $speaker->save();
        LogActivity::addToLog('Speaker Data Stored');
        return redirect('/speaker')->with('status', 'Speaker has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        LogActivity::addToLog('Edit Speaker Page Accessed');
        return view('admin.speaker-edit')->with('speaker', $speaker);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $speaker = Speaker::findOrFail($id);


        $speaker->speaker_name = $request->input('speaker_name');
        $speaker->speaker_bio = $request->input('speaker_bio');
        $speaker->speaker_email = $request->input('speaker_email');




        // If user upload a file during update
        if ($request->hasFile('speakerImg')) {

            // Delete the old profile image
            if ($speaker->speakerImg)
                if ((file_exists(storage_path('app/public/' . $speaker->speakerImg)))) {
                    unlink(storage_path('app/public/' . $speaker->speakerImg));
                }


            $fileName = "speakerImage-" . time() . '.' . request()->speakerImg->getClientOriginalExtension();
            $imagePath = (request('speakerImg')->storeAs('speakerImg', $fileName, 'public'));
            $speaker->speakerImg = $imagePath;
        }


        $speaker->update();
        LogActivity::addToLog('Speaker Data Updated');
        return redirect('speaker')->with('status', 'Speaker data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);

        // Delete the image stored in storage
        if ($speaker->speakerImg) {
            unlink(storage_path('app/public/' . $speaker->speakerImg));
        }
        $speaker->delete();
        LogActivity::addToLog('Speaker Data Deleted');
        return redirect('/speaker')->with('status', 'Speaker has been deleted');
    }
}
