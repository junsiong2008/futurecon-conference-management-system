<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\About;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        LogActivity::addToLog('About Record Fetched');
        return view('admin.about')->with('abouts', $abouts);
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        LogActivity::addToLog('About Edit Page Accesssed');
        return view('admin.about-edit')->with('about', $about);
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $about->description = $request->input('description');
        $about->venue = $request->input('venue');
        $about->date = $request->input('date');
        $about->save();
        LogActivity::addToLog('About Data Updated');
        return redirect('/about')->with('status', 'About Section has been updated');
    }
}
