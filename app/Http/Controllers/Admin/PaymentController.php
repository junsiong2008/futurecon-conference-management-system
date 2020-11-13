<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\Mail\PaymentVerified;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        LogActivity::addToLog('Payment Records Fetched');
        return view('admin.payment')->with('payment', $payment);
    }

    public function verify(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->payment_status = 1;
        $payment->update();

        Mail::to($payment->participant)->send(new PaymentVerified($payment));
        LogActivity::addToLog('Payment Data Verified');
        return redirect('payment')->with('status', 'Payment has been verified');
    }
}
