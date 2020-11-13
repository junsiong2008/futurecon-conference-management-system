<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationVerified;
use Illuminate\Http\Request;
use App\participant;
use Illuminate\Support\Facades\Mail;
use App\Helpers\LogActivity;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();
        LogActivity::addToLog('Participant Records Fetched');
        return view('admin.participant')->with('participants', $participants);
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
        //
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
        $participant = Participant::findOrFail($id);
        LogActivity::addToLog('Participant Edit Page Accessed');
        return view('admin.participant-edit')->with('participant', $participant);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'organization' => 'required',
            'phone_num' => 'required',
            'member_type' => 'required',
            'track_id' => 'required',
            'paper_id' => 'required',
            'present_method' => 'required',
        ]);


        $participant = Participant::findOrFail($id);
        $participant->fill($validatedData);
        $participant->update();
        LogActivity::addToLog('Participant Data Updated');
        return redirect('/participant')->with('status', 'Participant Info has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        LogActivity::addToLog('Participant Data Deleted');
        return redirect('participant')->with('status', 'Participant has been deleted');
    }

    public function verify($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->verify_status = 1;
        $participant->update();
        Mail::to($participant)->send(new RegistrationVerified($participant));
        LogActivity::addToLog('Participant Data Verified');
        return redirect('participant')->with('status2', 'Participant has been verified');
    }
}
