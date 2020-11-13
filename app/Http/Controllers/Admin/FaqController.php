<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        LogActivity::addToLog('Faq Records Fetched');
        return view('admin.faq')->with('faqs', $faqs);
    }



    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        LogActivity::addToLog('Edit FAQ Page Accessed');
        return view('admin.faq-edit')->with('faq', $faq);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->fill($validatedData);
        $faq->save();

        LogActivity::addToLog('Faq Data Updated');
        return redirect('faq')->with('status', 'Faq has been updated');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Faq();
        $faq->fill($validatedData);

        $faq->save();
        LogActivity::addToLog('Faq Data Stored');
        return redirect('/faq')->with('status', 'Faq has been added');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        LogActivity::addToLog('Faq Data Deleted');
        return redirect('/faq')->with('status', 'Faq has been deleted');
    }
}
