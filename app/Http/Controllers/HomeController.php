<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use App\About;
use App\Fee;
use App\Speaker;
use App\Faq;
use App\Track;
use App\Schedule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $abouts = About::first();
        $speakers = Speaker::all();
        $fees = Fee::all();
        $schedules = Schedule::all();
        $faqs = Faq::all();
        $tracks = Track::all();

        LogActivity::addToLog('Home Page Accessed');
        return view('index')
            ->with('abouts', $abouts)
            ->with('speakers', $speakers)
            ->with('fees', $fees)
            ->with('schedules', $schedules)
            ->with('faqs', $faqs)
            ->with('tracks', $tracks);
    }
}
