<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\LogActivity as LogActivityModel;

class LogController extends Controller
{
    public function logActivity()
    {
        $logs = LogActivity::logActivityLists();
        LogActivity::addToLog('Activity Logs Fetched');
        return view('admin.log', compact('logs'));
    }

    public function destroy($id)
    {
        $log = LogActivityModel::findOrFail($id);
        $log->delete();
        LogActivity::addToLog('Activity Log Deleted');
        return redirect('logActivity')->with('status', 'Log has been deleted');
    }

    public function clearLog()
    {
        LogActivityModel::truncate();
        LogActivity::addToLog('Activity Log Cleared');
        return redirect('logActivity')->with('status', 'All logs have been cleared');
    }
}
