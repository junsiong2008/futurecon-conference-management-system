<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Payment;
use App\Attendance;
use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationReceived;
use App\Helpers\LogActivity;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('participant');
        $request->session()->forget('payment');
        LogActivity::addToLog('Home Page Accessed');
        return view('index');
    }

    public function preStep(Request $request)
    {

        $tracks = Track::all();
        $participant = $request->session()->get('participant');
        $validatedData = $request->validate([
            'name' => 'required|unique:participants',
            'email' => 'required|unique:participants',
            'member_type' => 'required',
        ]);
        if (empty($request->session()->get('participant'))) {
            $participant = new Participant();
            $participant->fill($validatedData);
            $request->session()->put('participant', $participant);
        } else {
            $participant = $request->session()->get('participant');
            $participant->fill($validatedData);
            $request->session()->put('participant', $participant);
        }
        LogActivity::addToLog('Registration Modal Submitted');
        return redirect('/participants/create-step1')->with('tracks', $tracks);
    }

    public function createStep1(Request $request)
    {
        $tracks = Track::all();
        $participant = $request->session()->get('participant');
        LogActivity::addToLog('Step 1 of Registration Form Accessed');
        return view('participants.create-step1', compact('participant', 'tracks'));
    }

    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:participants',
            'email' => 'required|unique:participants',
            'organization' => 'required',
            'phone_num' => 'required',
            'member_type' => 'required',
            'track_id' => 'required',
            'paper_id' => 'required',
            'present_method' => 'required',
        ]);

        if (empty($request->session()->get('participant'))) {
            $participant = new Participant();
            $participant->fill($validatedData);
            $request->session()->put('participant', $participant);
        } else {
            $participant = $request->session()->get('participant');
            $participant->fill($validatedData);
            $request->session()->put('participant', $participant);
        }
        LogActivity::addToLog('Step 1 of Registration Form Submitted');
        return redirect('/participants/create-step2');
    }

    public function createStep2(Request $request)
    {
        $participant = $request->session()->get('participant');

        if (!($request->session()->has('participant'))) {
            return redirect('/participants/create-step1');
        }

        LogActivity::addToLog('Step 2 of Registration Form Accessed');
        return view('participants.create-step2', compact('participant'));
    }

    public function postCreateStep2(Request $request)
    {
        $participant = $request->session()->get('participant');
        $payment = $request->session()->get('payment');
        $request->session()->put('participant', $participant);
        LogActivity::addToLog('Step 3 of Registration Form Submitted');
        return view('participants.create-step3', compact('participant'));
    }

    // public function createStep3(Request $request)
    // {
    //     $participant = $request->session()->get('participant');
    //     return view('participants.create-step3', compact('participant'));
    // }

    public function store(Request $request)
    {

        $participant = $request->session()->get('participant');
        // dd($participant);

        if (!($request->session()->has('participant'))) {
            return redirect('/participants/create-step1');
        }

        // $payment = $request->session()->get('payment');


        $participant->save();

        $validatedData = $request->validate([
            'pay_by' => 'required',
            'paymentImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_status' => 'required',
        ]);

        // dd($validatedData['payment_status']);
        $payment = new Payment();

        $payment->pay_by = $validatedData['pay_by'];
        $payment->payment_status = $validatedData['payment_status'];

        if ($participant->member_type == 0) {
            $payment->payment_amount = 2200;
        } else if ($participant->member_type == 1) {
            $payment->payment_amount = 2000;
        } else if ($participant->member_type == 2) {
            $payment->payment_amount = 1600;
        }


        // $payment->pay_by = $validatedData['pay_by'];
        // $payment->payment_status = $validatedData['payment_status'];

        if ($request->hasFile('paymentImg')) {
            $fileName = "paymentImage-" . time() . '.' . request()->paymentImg->getClientOriginalExtension();
            $imagePath = (request('paymentImg')->storeAs('paymentImg', $fileName, 'public'));
            $payment->paymentImg = $imagePath;
        }

        $payment = $participant->payment()->save($payment);
        // dd($request->paymentImg->storeAs('paymentImg', $fileName));
        // $payment = $request->session()->get('payment');
        // $payment->paymentImg = $fileName;

        // $participant->payment()->associate($payment);
        // $participant->save();

        //$payment->participant()->associate($participant);
        //$payment->save();
        // $participant->payment()->save($payment);

        $attendance = new Attendance();
        $attendance->attendance_status = 0;
        $attendance = $participant->attendance()->save($attendance);
        // session()->forget('participant');
        // session()->forget('payment');
        // return view('participants.successful');
        Mail::to($participant)->send(new RegistrationReceived($participant));
        LogActivity::addToLog('Registration Form Data Stored');
        return $this->successful($request);
    }

    public function successful(Request $request)
    {

        if (!($request->session()->has('participant'))) {
            return redirect('/participants/create-step1');
        }




        session()->forget('participant');
        session()->forget('payment');
        LogActivity::addToLog('Registration Sucessful Page Displayed');
        return view('participants.successful');
    }
}
