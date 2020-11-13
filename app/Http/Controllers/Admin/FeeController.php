<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\Fee;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::all();
        LogActivity::addToLog('Fee Records Fetched');
        return view('admin.fee')->with('fees', $fees);
    }

    public function edit($id)
    {
        $fee = Fee::findOrFail($id);
        LogActivity::addToLog('Edit Fee Page Accessed');
        return view('admin.fee-edit')->with('fee', $fee);
    }

    public function update(Request $request, $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->title = $request->input('title');
        $fee->description = $request->input('description');
        $fee->price = $request->input('price');

        $fee->save();
        LogActivity::addToLog('Fee Data Updated');
        return redirect('/fee')->with('status', 'Fee data has been updated');
    }
}
